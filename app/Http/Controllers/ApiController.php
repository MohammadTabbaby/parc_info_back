<?php

namespace App\Http\Controllers;

use App\Myservice;
use App\About;
use App\Contact;
use Illuminate\Http\Request;
use Exception;


class ApiController extends Controller
{
    public function getAllService()
    {
        try {
            $services = Myservice::all();
            foreach ($services as $s) {
                $s->image = asset('/storage/' . $s->image);
            }
            return response()->json($services);
        } catch (Exception $e) {
            return response()->json([]);
        }
    }

    public function AboutUs()
    {
        try {
            $about = About::all()->first();
            $about->image = asset('/storage/' . $about->image);
            return response()->json($about);
        } catch (Exception $e) {
            return response()->json([]);
        }
    }

    public function ContactUs(Request $request)
    {
        try {
            $contacts = new Contact();
            $contacts->name = $request->name;
            $contacts->num_telephone = $request->num_telephone;
            $contacts->email = $request->email;
            $contacts->description = $request->description;
            $contacts->save();
            return response()->json(
                [
                    "code" => 1,
                    "status" => "sucess",
                    "message" => "message envoyé !"
                ]
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    "code" => 0,
                    "status" => "exception",
                    "message" => "Exception"
                ]
            );
        }
    }
}