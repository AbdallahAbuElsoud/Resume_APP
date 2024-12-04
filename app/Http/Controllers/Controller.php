<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;
use File;
use Session;

use DB;
use App\Models\about;
use App\Models\events;
use App\Models\skills;
use App\Models\resume;
use App\Models\Portfolio;
use App\Models\services;
use App\Models\massege;
use App\Models\social;
use App\Models\TemporaryFile;

// <!-- :::: Developed by :::: -->
// <!-- Abdallah Hasan Abu El Soud -->
// <!-- abdallah.h.abuelsoud@gmail.com -->

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // ***********************************************
    // *               Welcome Page                  *
    // ***********************************************

    //*************************************************************************
    // this function to veiw the Welcome page
    //*************************************************************************      
        public function Welcomepage(){
            $about=DB::table('about')->where('id', 1)->first();
            $skills=DB::table('skills')->get();
            $resume = DB::table('resume')->orderBy('To','desc')->get();
            $services = DB::table('services')->get();
            $dateOfBirth = $about->DOB;
            $years = Carbon::parse($dateOfBirth)->age;
            $Portfolio = DB::table('Portfolio')->get();
            $social = DB::table('social')->get();
            if( empty($about) && empty($skills) && empty($resume) && empty($Portfolio) && empty($services) && empty($social)){
                return view('welcome');
            }else{
                return view('welcome')->with('about' , $about)->with('age' , $years)->with('skills' , $skills)->with('resume' , $resume)->with('Portfolio' , $Portfolio)->with('services' , $services)->with('socials',$social);
            }
        }
    //************************************************************************

    // ***********************************************
    // *             Dashboard Page                  *
    // ***********************************************

    //*************************************************************************
    // this function to veiw the dashboard page
    //*************************************************************************      
        public function dashboard(){
            $about=DB::table('about')->where('id', 1)->first();
            $skills=DB::table('skills')->get();
            $resume = DB::table('resume')->get();
            $services = DB::table('services')->get();
            $dateOfBirth = $about->DOB;
            $years = Carbon::parse($dateOfBirth)->age;
            $Portfolio = DB::table('Portfolio')->get();
            $social = DB::table('social')->get();
            $msgcount = DB::table('massege')->count();
            if( empty($about) && empty($skills) && empty($resume) && empty($Portfolio) && empty($services) && empty($social)){
                return view('dashboard');
            }else{
                return view('dashboard')->with('about' , $about)->with('age' , $years)->with('skills' , $skills)->with('resume' , $resume)->with('Portfolio' , $Portfolio)->with('services' , $services)->with('socials',$social)->with('msgcount',$msgcount);
            }
        }
    //************************************************************************

    // ***********************************************
    // *                  Events                     *
    // ***********************************************

    //*************************************************************************
    // this function will return the events from DB
    //*************************************************************************  
    
        public function calendar(Request $request)
        {
            $events = DB::table('events')->get();
            if(empty( $events) ){
                return view('dashboard/calendar');
            }else{
                return view('dashboard/calendar')->with('events',$events);
            }
        }       
    //************************************************************************


    //*************************************************************************
    // this function to save events from calender
    //*************************************************************************  
        
        public function storevents(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'eventTitle'     => 'required',
                'eventNote'      => 'required',
                'eventColor'     => 'required',
                'drgpickerstart' => 'required',
                'drgpickerend'   => 'required',
            ]);

            if ($validator->passes()) {
              $events = new events;
              $events->title           = $request->eventTitle;
              $events->description     = $request->eventNote;
              $events->start           = $request->drgpickerstart;
              $events->end             = $request->drgpickerend;
              $events->backgroundColor = $request->eventColor;
              if($events->save()){
                Alert::success('Event Added Successfuly');
                return redirect('/calendar');             
            }
            }else{
                Alert::error('OOPS!' , $validator->errors()->all());
                return redirect('/calendar');             

              }
        }      
    //************************************************************************

    //*************************************************************************
    // this function to Delete Event frome  DB
    //*************************************************************************      
        public function remove_event($id){
            $event = DB::table('events')->where('id', '=', $id)->first();
            if(!empty($event)){
                    DB::table('events')->where('id', '=', $id)->delete();                        
            }else{
                Alert::error('Data not Found 😪 ');  
            }            
            return $event->id; 
        }
    //************************************************************************

    //*************************************************************************
    // this function will return the events from DB
    //*************************************************************************  
    
        public function events(Request $request)
        {
            $events = DB::table('events')->get();
            return response()->json($events);
        }       
    //************************************************************************

    // ***********************************************
    // *                   Skills                    *
    // ***********************************************

    //*************************************************************************
    // this function to veiw the skills page
    //*************************************************************************      
        public function skills(){
            $skills=DB::table('skills')->get();
            if( empty($skills)){
                return view('dashboard/skills');
            }else{
                return view('dashboard/skills')->with('skills' , $skills);
            }
        }
    //************************************************************************

    //*************************************************************************
    // this function to save skills from skills page in dash
    //*************************************************************************  
            
        public function storeskills(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'skilletitle'  => 'required',
                'photo'        => 'required',
            ]);
                if ($validator->passes()) {
                    $skills = new skills;
                    $skills->title  = $request->skilletitle;
                    $skills->photo  = $request->photo;
                    if($skills->save() && DB::table('temporary_files')->where('file', $request->photo)->delete()){
                        Alert::success('skille Added Successfuly', 'skille add Successfuly ');
                        return redirect('/skills');             
                    }
                }else{
                    File::delete(public_path($request->photo));
                    DB::table('temporary_files')->where('file', $request->photo)->delete();
                    Alert::error('OOPS!' , $validator->errors()->all());
                    return redirect('/skills');             

                }
        }      
    //************************************************************************

    //*************************************************************************
    // this function to Delete Skille  frome  DB
    //*************************************************************************      
        public function remove_skille($id){
            $skille = DB::table('skills')->where('id', '=', $id)->first();
            if(File::exists(public_path($skille -> photo))){
                File::delete(public_path($skille -> photo));
                DB::table('skills')->where('id', '=', $id)->delete();
                Alert::success('Skille Deleted Successfully 🎉');             
            }else{
                Alert::error('File Not Found 😪 ');   
            }
            return redirect('/skills'); 
        }
    //************************************************************************

    //*************************************************************************
    // this function to show edit Skille page
    //*************************************************************************      
        public function edit_skille($id){
            $skille = DB::table('skills')->where('id', '=', $id)->first();
            if( empty($skille)){
                return view('dashboard/skills_edit');
            }else{
                return view('dashboard/skills_edit')->with('skille' , $skille);
            }
        }
    //************************************************************************

    //*************************************************************************
    // this function to Edit on Skille  
    //*************************************************************************      
        public function update_skille(Request $request){ 
            $validator = Validator::make($request->all(), [
                'skilleid'        => 'required',
                'skilletitle'     => 'required',
            ]);
            $eximg = explode('.', $request->photo)[1];
            if($eximg == 'png' || $eximg == 'jpg' || $eximg == 'jpeg'){
                $skille = DB::table('skills')->where('id', $request->skilleid)->first();
                if( !empty($skille)){
                    if ($validator->passes()) {
                        $data= array(
                            "title"    => $request -> skilletitle,
                            "photo"    => $request -> photo,
                        );
                        File::delete(public_path($skille->photo));//This Line will delete the old file
                        // File::delete($skille->photo); //This Line will delete the old file
                        $data_updat = DB::table('skills')->where('id', $request->skilleid)->update($data);
                        if($data_updat){
                            Alert::success('Skille Updated Successfully 🎉');  
                            return redirect('/skills'); 
                        }else{
                            Alert::error('Error, better Call Abdallah 😎'); 
                            return redirect('/skills');             
                        } 
                    }else{
                        File::delete(public_path($request->photo));
                        DB::table('temporary_files')->where('file', $request->photo)->delete();
                        Alert::error('OOPS!' , $validator->errors()->all());   
                    }
                }else{
                    Alert::error('Skille not Found on DB 😥');
                }
        }else{
            Alert::error('OOPS!' , 'photo Must be an Image (jpg , jpeg , png)');  
            return redirect('/skills'); 
        }

        }
    //************************************************************************

    // ***********************************************
    // *                   About                     *
    // ***********************************************

    //*************************************************************************
    // this function to veiw the about page
    //*************************************************************************      
        public function showabout(){
            $about=DB::table('about')->where('id', 1)->first();
            $dateOfBirth = $about->DOB;
            $years = Carbon::parse($dateOfBirth)->age;
            if( empty($about)){
                return view('dashboard/about');
            }else{
                return view('dashboard/about')->with('about' , $about)->with('age' , $years);
            }
        }
    //************************************************************************
    
    //*************************************************************************
    // this function to update on About  
    //*************************************************************************      
        public function update_about(Request $request){ 
            $validator = Validator::make($request->all(), [
                'name'       => 'required',
                'role'       => 'required',
                'brfabout'   => 'required',
                'DOB'        => 'required',
                'phone'      => 'required',
                'city'       => 'required',
                'degree'     => 'required',
                'email'      => 'required',
            ]);
            $eximg = explode('.', $request->photo)[1];
            if($eximg == 'png' || $eximg == 'jpg' || $eximg == 'jpeg'){
                $about = DB::table('about')->where('id', 1)->first();
                if( !empty($about)){
                    if ($validator->passes()) {
                        if(!empty($request->photo)){
                            $data= array(
                                "name"                  => $request -> name,
                                "roles"                 => explode(',' , $request -> role),
                                "brfabout"              => $request -> brfabout,
                                "DOB"                   => $request -> DOB,
                                "phone"                 => $request -> phone,
                                "degree"                => $request -> degree,
                                "city"                  => $request -> city,
                                "email"                 => $request -> email,
                                "profile_photo_path"    => $request -> photo,
                            );
                            $delfile     = File::delete(public_path($about->profile_photo_path));//This Line will delete the old file
                            $deltempfile = DB::table('temporary_files')->where('file', $request->photo)->delete();
                            $data_updat  = DB::table('about')->where('id', 1)->update($data);
                            if($data_updat && $delfile && $deltempfile){
                                Alert::success('About  Updated Successfully 🎉');  
                                return redirect('/about'); 
                            }else{
                                Alert::error('Error, better Call Abdallah 😎'); 
                                return redirect('/about');             
                            } 
                        }else{
                            $data= array(
                                "name"                  => $request -> name,
                                "roles"                 => explode(',' , $request -> role),
                                "brfabout"              => $request -> brfabout,
                                "DOB"                   => $request -> DOB,
                                "phone"                 => $request -> phone,
                                "degree"                => $request -> degree,
                                "city"                  => $request -> city,
                                "email"                 => $request -> email,
                                "profile_photo_path"    => $about   -> profile_photo_path,
                            );
                            $data_updat  = DB::table('about')->where('id', 1)->update($data);
                            if($data_updat){
                                Alert::success('About  Updated Successfully 🎉');  
                                return redirect('/about'); 
                            }else{
                                Alert::error('Error, better Call Abdallah 😎'); 
                                return redirect('/about');             
                            } 
                        }
                    }else{
                        File::delete(public_path($request->photo));
                        DB::table('temporary_files')->where('file', $request->photo)->delete();
                        Alert::error('OOPS!' , $validator->errors()->all());  
                        return redirect('/about'); 
                    }
                }else{
                    Alert::error('About not Found on DB 😥');
                    return redirect('/about');
                }
            }else{
                Alert::error('OOPS!' , 'photo Must be an Image (jpg , jpeg , png)');  
                return redirect('/about'); 
            }

        }
    //************************************************************************
    
    // ***********************************************
    // *                   File                      *
    // ***********************************************

    //*************************************************************************
    //        this function will save file temp
    //*************************************************************************    
        public function tmpUpload(Request $request){
            $validator = Validator::make($request->all(), [
                'photo'       => 'required|file|image|mimes:jpeg,jpg,png|max:2048',
            ]);
            $tempfile = new TemporaryFile;
            if($request -> hasFile('photo') && $validator->passes()){
                $requestData = $request->file('photo');
                $fileName = time().$request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->storeAs('img', $fileName, 'public');
                $img = '/storage/'.$path;
                $tempfile->file = $img;
                $tempfile->save();      
                return $img;                
            }
            return "";          
        }
    //************************************************************************

    //*************************************************************************
    //        this function will delete temp file 
    //*************************************************************************    
        public function tmpDelete(){
            $tmp_file = DB::table('temporary_files')->where('file', request()->getContent())->first();
            // $tmp_file = TemporaryFile::where('file', $request->getContent())->first();
                    if($tmp_file){
                    File::delete(public_path($tmp_file->file));
                    // Storage::deleteDirectory($tmp_file->file);
                    DB::table('temporary_files')->where('file', request()->getContent())->delete();
                    return response('');
                }
        }
    //************************************************************************

    // ***********************************************
    // *                   Resume                    *
    // ***********************************************

    //*************************************************************************
    // this function to veiw the resume page
    //*************************************************************************      
        public function show_Resume(){
            $resume = DB::table('resume')->orderBy('To','desc')->get();
            if( empty($resume)){
                return view('dashboard/Resume');
            }else{
                return view('dashboard/Resume')->with('resume' , $resume);
            }
        }
    //************************************************************************

    //*************************************************************************
    // this function to save resume element from Resume page in dash
    //*************************************************************************  
                
        public function Storresume(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'Title'      => 'required',
                'start'      => 'required',
                'end'        => 'required',
                'where'      => 'required',
                'Des'        => 'required',
                'Type'       => 'required',
            ]);

            if ($validator->passes()) {
                $startdate = date_create($request->start);
                $enddate   = date_create($request->end);
                $resume = new resume;
                $resume->titel   = $request->Title;
                $resume->from    = $request->start;
                $resume->To      = $request->end;
                $resume->where   = $request->where;
                $resume->des     = $request->Des;
                $resume->type    = $request->Type;
                if($resume->save()){
                    Alert::success('Resume Element Added Successfuly', 'Resume Element add Successfuly ');
                    return redirect('/Resume');             
                }
            }else{
                Alert::error('OOPS!' , $validator->errors()->all());
                return redirect('/Resume');             

            }
        }      
    //************************************************************************

    //*************************************************************************
    // this function to Delete resume element  frome  DB
    //*************************************************************************      
        public function remove_resume($id){
            if(DB::table('resume')->where('id', '=', $id)->delete()){
                Alert::success('resume element Deleted Successfully 🎉');             
            }else{
                Alert::error('not Deleted 😪 ');   
            }
            return redirect('/Resume'); 
        }
    //************************************************************************

    //*************************************************************************
    // this function to show edit resume page
    //*************************************************************************      
        public function edit_resume($id){
            $resume = DB::table('resume')->where('id', '=', $id)->first();

            if( empty($resume)){
                return view('dashboard/Resume_edit');
            }else{
                $startdate = date('y-m-d',strtotime($resume->from));
                $todate = date('y-m-d',strtotime($resume->To));
                return view('dashboard/Resume_edit')->with('resume' , $resume)->with('from' , $startdate)->with('To' , $todate);
            }
        }
    //************************************************************************

    //*************************************************************************
    // this function to update on resume element  
    //*************************************************************************      
        public function update_resume(Request $request){ 
            $validator = Validator::make($request->all(), [
                'Title'      => 'required',
                'start'      => 'required',
                'end'        => 'required',
                'where'      => 'required',
                'Des'        => 'required',
                'Type'       => 'required',
            ]);
            $resume = DB::table('resume')->where('id', $request->skilleid)->first();
            if( !empty($resume)){
                if ($validator->passes()) {
                    $data= array(
                        "titel"    => $request -> Title,
                        "from"     => $request -> start,
                        "To"       => $request -> end,
                        "where"    => $request -> where,
                        "des"      => $request -> Des,
                        "type"     => $request -> Type,
                    );
                    $data_updat = DB::table('resume')->where('id', $request->skilleid)->update($data);
                    if($data_updat){
                        Alert::success('Resume Element Updated Successfully 🎉');  
                        return redirect('/Resume'); 
                    }else{
                        Alert::error('Error, better Call Abdallah 😎'); 
                        return redirect('/Resume');             
                    } 
                }else{
                    Alert::error('OOPS!' , $validator->errors()->all());   
                }
            }else{
                Alert::error('Skille not Found on DB 😥');
            }
        }
    //************************************************************************

    // ***********************************************
    // *                 Portfolio                   *
    // ***********************************************

    //*************************************************************************
    // this function to veiw the Portfolio page
    //*************************************************************************      
        public function Portfolio(){
            $Portfolio = DB::table('Portfolio')->get();
            if( empty($Portfolio)){
                return view('dashboard/Portfolio');
            }else{
                return view('dashboard/Portfolio')->with('Portfolio' , $Portfolio);
            }
        }
    //************************************************************************

    //*************************************************************************
    // this function to Store Project from Portfolio page in dash
    //*************************************************************************    
        public function storeprotfolio(Request $request)
        {
            $photos = DB::table('temporary_files')->get();
            $imgs = array();
            foreach($photos as $img){
                array_push($imgs, $img->file);
            }
            $validator = Validator::make($request->all(), [
                'title'      => 'required',
                'dis'        => 'required',
                'client'     => 'nullable',
                'URL'        => 'nullable',
                'photo'      => 'required',
                'Type'       => 'required',
            ]);
            if ($validator->passes()) {
                $Portfolio = new Portfolio;
                $Portfolio->titel     = $request->title;
                $Portfolio->des       = $request->dis;
                $Portfolio->client    = $request->client;
                $Portfolio->url       = $request->URL;
                $Portfolio->photos    = implode(',', $imgs);
                $Portfolio->category  = $request->Type;
                if($Portfolio->save()){
                    foreach($photos as $img){
                        DB::table('temporary_files')->where('file', $img->file)->delete();
                    }
                    Alert::success('Project Added Successfuly', 'Project add Successfuly ');
                    return redirect('/Portfolio');             
                }
            }else{
                File::delete(public_path($request->photo));
                DB::table('temporary_files')->where('file', $request->photo)->delete();
                Alert::error('OOPS!' , $validator->errors()->all());
                return redirect('/Portfolio');             

            }
        }      
    //************************************************************************

    //*************************************************************************
    // this function to show Portfolio Project Details page
    //*************************************************************************      
        public function portfolio_details($id){
            $portfolio = DB::table('Portfolio')->where('id', '=', $id)->first();

            if( empty($portfolio)){
                return view('dashboard/portfolio_details');
            }else{
                $imgs = explode(',', $portfolio->photos);
                return view('dashboard/portfolio_details')->with('portfolio' , $portfolio)->with('imgs' , $imgs);
            }
        }
    //************************************************************************

    //*************************************************************************
    // this function to Delete portfolio element  frome  DB
    //*************************************************************************      
        public function remove_portfolio($id){
            $Portfolio = DB::table('Portfolio')->where('id', '=', $id)->first();
            $imgs = explode(',', $Portfolio->photos);
            foreach($imgs as $img){
                if(File::exists(public_path($img))){
                    File::delete(public_path($img));
                }else{
                    Alert::error('File Not Found 😪 ' , '{{$img}} not found ');  
                } 
            }
            if(DB::table('Portfolio')->where('id', '=', $id)->delete()){                
                Alert::success('Project Deleted Successfully 🎉');
            }else{
                Alert::error('Project Can not delete it😪 ');  
            }             
  
            return redirect('/Portfolio'); 
        }
    //************************************************************************

    //*************************************************************************
    // this function to show edit portfolio page
    //*************************************************************************      
        public function edit_Portfolio($id){
            $portfolio = DB::table('Portfolio')->where('id', '=', $id)->first();

            if( empty($portfolio)){
                return view('dashboard/edite_portfolio');
            }else{
                $imgs = explode(',', $portfolio->photos);
                return view('dashboard/edite_portfolio')->with('portfolio' , $portfolio)->with('imgs' , $imgs);
            }
        }
    //************************************************************************

    //*************************************************************************
    // this function to Store Project from Portfolio page in dash
    //*************************************************************************    
        public function update_protfolio(Request $request){
            $validator = Validator::make($request->all(), [
                'title'      => 'required',
                'dis'        => 'required',
                'client'     => 'nullable',
                'URL'        => 'nullable',
                'Type'       => 'required',
            ]);
            $portfolio = DB::table('Portfolio')->where('id', '=', $request->id)->first();
            if( !empty($portfolio)){
                if(empty($request->photo)){
                    if ($validator->passes()) {
                        $data= array(
                            "titel"    => $request -> title,
                            "des"      => $request -> dis,
                            "client"   => $request -> client,
                            "url"      => $request -> URL,
                            "photos"   => $portfolio->photos,
                            "category" => $request -> Type,
                        );
                        $data_updat = DB::table('Portfolio')->where('id', $request->id)->update($data);
                        if($data_updat){
                            Alert::success('Project {{$portfolio->titel}} Updated Successfully 🎉');  
                            return redirect('/Portfolio'); 
                        }else{
                            Alert::error('Error, better Call Abdallah 😎'); 
                            return redirect('/Portfolio');             
                        } 
                    }else{
                        Alert::error('OOPS!' , $validator->errors()->all());   
                    }
                }else{
                    $photos = DB::table('temporary_files')->get();
                    $imgs = array();
                    foreach($photos as $img){
                        array_push($imgs, $img->file);
                    }
                    if ($validator->passes()) {
                        $data= array(
                            "titel"    => $request -> title,
                            "des"      => $request -> dis,
                            "client"   => $request -> client,
                            "url"      => $request -> URL,
                            "photos"   => implode(',', $imgs),
                            "category" => $request -> Type,
                        );
                        $data_updat = DB::table('Portfolio')->where('id', $request->id)->update($data);
                        if($data_updat){
                            foreach($photos as $img){
                                DB::table('temporary_files')->where('file', $img->file)->delete();
                            }
                            Alert::success('Project {{$portfolio->titel}} Updated Successfully 🎉');  
                            return redirect('/Portfolio'); 
                        }else{
                            foreach($photos as $img){
                                DB::table('temporary_files')->where('file', $img->file)->delete();
                                File::delete(public_path($img->file));
                            }
                            Alert::error('Error, better Call Abdallah 😎'); 
                            return redirect('/Portfolio');             
                        } 
                    }else{
                        foreach($photos as $img){
                            DB::table('temporary_files')->where('file', $img->file)->delete();
                            File::delete(public_path($img->file));
                        }
                        Alert::error('OOPS!' , $validator->errors()->all());   
                    }                                        
                }
            }else{
                Alert::error('Project Not Found In DB😎'); 
                return redirect('/Portfolio'); 
            }


         }      
    //************************************************************************
    
    //*************************************************************************
    // this function to veiw the Portfolio page
    //*************************************************************************      
        public function Services(){
            $services = DB::table('services')->get();
            if( empty($services)){
                return view('dashboard/Services');
            }else{
                return view('dashboard/Services')->with('services' , $services);
            }
        }
    //************************************************************************

    // ***********************************************
    // *                  Services                   *
    // ***********************************************

    //*************************************************************************
    // this function to save services from services page in dash
    //*************************************************************************      
        public function storeservices(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'title'     => 'required',
                'dis'       => 'required',
                'color'     => 'required',
                'photo'     => 'required',
            ]);

            if ($validator->passes()) {
            $services = new services;
            $services->titel  = $request->title;
            $services->dis    = $request->dis;
            $services->color  = $request->color;
            $services->img    = $request->photo;
            if($services->save() && DB::table('temporary_files')->where('file', $request->photo)->delete()){
                Alert::success('service Added Successfuly', 'service add Successfuly ');
                return redirect('/Services');             
            }
            }else{
                File::delete(public_path($request->photo));
                DB::table('temporary_files')->where('file', $request->photo)->delete();
                Alert::error('OOPS!' , $validator->errors()->all());
                return redirect('/Services');             

            }
        }      
    //************************************************************************

    //*************************************************************************
    // this function to Delete Service frome  DB
    //*************************************************************************      
        public function remove_services($id){
            $services = DB::table('services')->where('id', '=', $id)->first();
            if(!empty($services)){
                if(File::exists(public_path($services -> img))){
                    File::delete(public_path($services -> img));
                    if(DB::table('services')->where('id', '=', $id)->delete()){
                        Alert::success('service Deleted Successfully 🎉');  
                    }else{
                        Alert::error('OOPs!!!! 😪 ' , 'Somthing Went Wrong');   
                    }
                               
                }else{
                    Alert::error('File Not Found 😪 ');   
                }
            }else{
                Alert::error('Data not Found 😪 ');  
            }
            
            return redirect('/Services'); 
        }
    //************************************************************************

    //*************************************************************************
    // this function to show edit service page
    //*************************************************************************      
        public function edit_service($id){
            $service = DB::table('services')->where('id', '=', $id)->first();
            if( empty($service)){
                return view('dashboard/Services_edite');
            }else{
                return view('dashboard/Services_edite')->with('service' , $service);
            }
        }
    //************************************************************************

    //*************************************************************************
    // this function to show edit service page
    //*************************************************************************      
        public function update_service(Request $request){
            $validator = Validator::make($request->all(), [
                'title'     => 'required',
                'dis'       => 'required',
                'color'     => 'required',
            ]);
            $service = DB::table('services')->where('id', '=', $request->id)->first();
            if( !empty($service)){
                if(empty($request->photo)){
                    if ($validator->passes()) {
                        $data= array(
                            "titel"    => $request -> title,
                            "dis"      => $request -> dis,
                            "color"   => $request -> color,
                            "img"      => $service -> img,
                        );
                        $data_updat = DB::table('services')->where('id', $request->id)->update($data);
                        if($data_updat){
                            Alert::success('Service Updated Successfully 🎉');  
                            return redirect('/Services'); 
                        }else{
                            Alert::error('Error, better Call Abdallah 😎', 'Service not Updated!!!'); 
                            return redirect('/Services');             
                        }
                    }else{
                        Alert::error('OOPS!' , $validator->errors()->all());
                        return redirect('/Services'); 
                    }
                }else{
                    if ($validator->passes()) {
                        $data= array(
                            "titel"    => $request -> title,
                            "dis"      => $request -> dis,
                            "color"   => $request -> color,
                            "img"      => $request -> photo,
                        );
                        $data_updat = DB::table('services')->where('id', $request->id)->update($data);
                        if($data_updat){
                            DB::table('temporary_files')->where('file', $request->photo)->delete();                            
                            Alert::success('Service Updated Successfully 🎉');  
                            return redirect('/Services'); 
                        }else{
                            DB::table('temporary_files')->where('file', $request->photo)->delete();
                            File::delete(public_path($request->photo));
                            Alert::error('Error, better Call Abdallah 😎' , 'Service not updated '); 
                            return redirect('/Services');             
                        } 
                    }else{
                        DB::table('temporary_files')->where('file', $request->photo)->delete();
                        File::delete(public_path($request->photo));
                        Alert::error('OOPS!' , $validator->errors()->all());  
                        return redirect('/Services');             
 
                    }     
                }
            }else{
                Alert::error('Error, better Call Abdallah 😎', 'Service not found in DB !!!'); 
                return redirect('/Services');   
            }

        }
    //************************************************************************

    //*************************************************************************
    // this function to save services from services page in dash
    //*************************************************************************      
        public function sendmsg(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name'      => 'required|string|max:255',
                'subject'   => 'required|string|max:255',
                'message'   => 'required',
                'email'     => 'required|email',
            ]);

            if ($validator->passes()) {
                $massege = new massege;
                $massege->name  = $request->name;
                $massege->email    = $request->email;
                $massege->subject  = $request->subject;
                $massege->msg    = $request->message;
                if($massege->save()){
                    Alert::success('Thank you', 'I will contact you as soon as possible');
                    return redirect('/');             
                }
            }else{
                Alert::error('OOPS!' , $validator->errors()->all());
                return redirect('/');             

            }
        }      
    //************************************************************************

    // ***********************************************
    // *                 Messages                    *
    // ***********************************************

    //*************************************************************************
    // this function to veiw the Messages page
    //*************************************************************************      
        public function showMessages(){
            $masseges = DB::table('massege')->orderBy('created_at','desc')->paginate(5);
            // $masseges = massege::paginate(10);
            if( empty($masseges)){
                return view('dashboard/msg');
            }else{
                return view('dashboard/msg',compact('masseges'));
            }
        }
    //************************************************************************

    //*************************************************************************
    // this function to Delete Massege frome  DB
    //*************************************************************************      
        public function remove_msg($id){
            $massege = DB::table('massege')->where('id', '=', $id)->first();
            if(!empty($massege)){
                    if(DB::table('massege')->where('id', '=', $id)->delete()){
                        Alert::success('massege Deleted Successfully 🎉' , 'Message are deleted you can not return it again!!'); 
                        return redirect('/Messages');  
                    }else{
                        Alert::error('OOPs!!!! 😪 ' , 'Somthing Went Wrong');
                        return redirect('/Messages');    
                    }
            }else{
                Alert::error('Data not Found 😪 ');
                return redirect('/Messages');   
            }
            
        }
    //************************************************************************

    // ***********************************************
    // *                 Logout                      *
    // ***********************************************

    //*************************************************************************
    // this function to Logout
    //*************************************************************************      
        public function logout(){  
            Session::flush();
        
            auth()->guard('web')->logout();
            
            Alert::success('You are sign out successfuly ');

            return redirect('/');  
        }
    //************************************************************************

    // ***********************************************
    // *              Social Links                   *
    // ***********************************************

    //*************************************************************************
    // this function will return the social from DB
    //*************************************************************************      
        public function showsocial(Request $request)
        {
            $social = DB::table('social')->get();
            if(empty( $social) ){
                return view('dashboard/social');
            }else{
                return view('dashboard/social')->with('socials',$social);
            }
        }       
    //************************************************************************

    //*************************************************************************
    // this function to Social Media Link (URL) to DB
    //*************************************************************************      
        public function storesocial(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'icon'  => 'required',
                'url'   => 'required',
            ]);

            if ($validator->passes()) {
                $social = new social;
                $social->icon   = $request->icon;
                $social->url    = $request->url;
                if($social->save()){
                    Alert::success('Link Add it Successfully 🎉'); 
                    return redirect('/showsocial');             
                }
            }else{
                Alert::error('OOPS!' , $validator->errors()->all());
                return redirect('/showsocial');             

            }
        }      
    //************************************************************************

    //*************************************************************************
    // this function to Delete Social Media Link  frome  DB
    //*************************************************************************      
        public function remove_social($id){
            $social = DB::table('social')->where('id', '=', $id)->first();
            if(!empty($social)){
                    if(DB::table('social')->where('id', '=', $id)->delete()){
                        Alert::success('Link  Deleted Successfully 🎉');  
                    }else{
                        Alert::error('OOPs!!!! 😪 ' , 'Somthing Went Wrong');   
                    }                            
            }else{
                Alert::error('Data not Found 😪 ');  
            }            
            return redirect('/showsocial'); 
        }
    //************************************************************************


    
}