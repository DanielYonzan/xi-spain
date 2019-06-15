<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Category;
use App\Checkout;
use App\Code;
use App\Event;
use App\Feature;
use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class FrontController extends Controller
{
    public function index()
    {
        if (Session::get('language') == NULL) {
            Session::put('language', 'sp');
        }
        $features = Feature::where('status', 1)->get();
        $categorys = Category::where('status', 1)->get();
        $data = Product::orderBy('updated_at', 'desc')->get();
        $events = Event::where('status', 1)->orderBy('date', 'asc')->get();
        return view('index', compact('features', 'categorys', 'events', 'data'));
    }

    public function changeLanguage($lang)
    {
        Session::put('language', $lang);
        return redirect()->route('front.index');
    }

    public function eventCheckout($id)
    {
        $data = Event::where('id', $id)->where('status', 1)->first();
        return view('eventCheckout', compact('data'));
    }

    public function saveCheckout()
    {
        $status = Checkout::create([
            'event' => $_POST['event'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'price' => $_POST['price'],
        ]);
        if ($status) {
            return response()->json(true, 200);
        }
    }

    function getCatalogue()
    {
        $code = $_POST['code'];
        $category = $_POST['category'];
        $data = Code::where('value', $code)->first();
        if (!$data) {
            return response()->json(null, 403);
        } else {
            $lang = Session::get('language');
            $name_key = 'name_' . $lang;
            $short_description_key = 'short_description_' . $lang;
            $products = Product::where('category', $category)->get();
            $html = '<div class="table-tools form-group text-right"></div>';
            $html .= '<table class="table table-bordered advanced-table" style="width:100%">';
            $html .= '<thead><tr><th width="3%">S.N.</th><th width="20%">Name</th><th width="10%">Image</th><th width="10%">Size(ml)</th><th width="10"%>Price(€)</th><th width="10%">Origin</th><th width="8%">Min Order</th><th>Short Description</th></tr></thead>';

            $html .= '<tbody>';
            $i = 1;
            $images = [];
            foreach ($products as $product) {
                $html .= '<tr>';
                $html .= '<td>' . $i++ . '</td>';
                $html .= '<td>' . $product->$name_key . '</td>';
                $imagepath = asset('img/product/' . $product->image);
                $html .= '<td><img class="img-fluid" src="' . $imagepath . '" width="100"></td>';
                $html .= '<td>' . $product->size . '</td>';
                $html .= '<td>' . $product->price . '</td>';
                $html .= '<td>' . $product->origin . '</td>';
                $html .= '<td>' . $product->min_order . '</td>';
                $html .= '<td>' . $product->$short_description_key . '</td>';
                $html .= '</tr>';
                array_push($images, $imagepath);
            }
            $html .= '</tbody>';
            $html .= '</table>';
            return response()->json(['table' => $html, 'images' => $images], 200);
        }
    }

    function getAgent()
    {
        $code = $_POST['code'];
        $country = $_POST['country'];
        $data = Code::where('value', $code)->first();
        if (!$data) {
            return response()->json(null, 403);
        } else {
            $agents = Agent::where('country', $country)->get();
            $html = '<div class="row">';
            if(count($agents)>0){
                foreach ($agents as $agent) {
                    $html .= '<div class="col-md-6 agent">';
                    $html .= '<div class="row">';
                    $html .= '<div class="col-sm-5 img-container" style="max-width: 200px">';
                    $html .= '<img class="img-responsive" src="'.asset('img/agent/'.$agent->image).'" width="200" alt="'.$agent->name.'">';
                    $html .= '</div>';
                    $html .= '<div class="col-sm-7">';
                    $html .= '<h4>'.$agent->name.'</h4>';
                    $html .= '<div class="subtitle">(Agent in '.$agent->city.')</div>';
                    $html .= '<p>';
                    $html .= '<i class="fa fa-whatsapp text-yellow"></i>: '.$agent->whatsapp.'<br>';
                    if($agent->skype) {
                        $html .= '<i class="fa fa-skype text-yellow"></i>: ' . $agent->skype . '<br>';
                    }
                    if($agent->website) {
                        $html .= '<i class="fa fa-globe text-yellow"></i>: ' . $agent->website . '<br>';
                    }
                    $html .= '<i class="fa fa-envelope text-yellow"></i>: '.$agent->email.'<br>';
                    $html .= '<span class="text-yellow">Speciality</span>: '.$agent->categorydata->name_en;
                    $html .= '</p>';
                    $html .= '</div>';
                    $html .= '</div>';
                    $html .= '</div>';
                }
            }else{
                $html.='<p class="text-center">Partners in this country will be listed soon!</p>';
            }
            $html .= '</div>';
            return response()->json($html, 200);
        }
    }

    public function contact_me(Request $request)
    {
        $company = $address = $country = $cv = $filename = null;
        $destinationPath = public_path('cv');
        if ($request->has('join_us_form')) {
            $this->validate($request, [
                'name' => 'required',
                'companyname' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'message' => 'required',
            ]);
            $name = $request->input('name');
            $email_address = $request->input('email');
            $phone = $request->input('phone');
            $message = $request->input('message');
            $company = $request->input('companyname');
            $address = $request->input('address');
            $country = $request->input('country');
            $cv = $request->file('cv');
            if ($cv) {
                $filename = time() . '.' . $cv->getClientOriginalExtension();
                $cv->move($destinationPath, $filename);
            }
        } else {
            $this->validate($request, [
                'c_name' => 'required',
                'c_email' => 'required|email',
                'c_phone' => 'required',
                'c_message' => 'required',
            ]);
            $name = $request->input('c_name');
            $email_address = $request->input('c_email');
            $phone = $request->input('c_phone');
            $message = $request->input('c_message');
        }

        $settings_mailreceiver = "info@xi-spain.com";
        $settings_mailsender = "contact@xi-spain.com";

        try {
            $mail = new PHPMailer(true); // notice the \  you have to use root namespace here
//            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.strato.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $settings_mailsender;                 // SMTP username
            $mail->Password = 'perrito1@123';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Sender
            $mail->setFrom($settings_mailsender, 'xi-spain mailer');

            //Receipent
            $mail->addAddress($settings_mailreceiver);
//            $mail->addAddress('thapasushil6@gmail.com');

            //Content
            $mail->isHTML(true);
            $mail->Subject = "Website Contact Form: $name";

            $additional = "";
            if ($cv) {
                $additional = <<< EOT
        Company Name: $company
        Address: $address
        Country: $country
EOT;
                $mail->AddAttachment($destinationPath, $filename);
            }

            $mail->Body = <<< EOT
    You have received a new message from your website contact form.
    Here are the details:
        Name: $name
        Mail: $email_address
        Phone: $phone
    $additional
        Message: $message
    
    Sent from your PHP Contact Mailer
EOT;

            if ($mail->send()) {
                Session::flash('message', '<strong>Success!</strong>. Your Enquiry has been sent successfully!');
                Session::flash('alert-class', 'success');
            } else {
                Session::flash('message', '<strong>Failed!</strong>. Your Enquiry failed to send!');
                Session::flash('alert-class', 'danger');
            }
        } catch (Exception $e) {
            Session::flash('message', '<strong>Failed!</strong>. Message could not be sent. Mailer Error: ', $mail->ErrorInfo);
            Session::flash('alert-class', 'danger');
        }
        return redirect()->route('front.index');
    }
}
