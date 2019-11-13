<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolHelperController extends Controller
{
    // get school information
    public function getSchoolInfo()
    {
        // return school information
        return ['campus'=>$this->getCampusId(), 'institute'=>$this->getInstituteId()];
    }

    // get school academic year
    public function getAcademicYear(){
        // academic level list url
        $url = $this->getEmsUrl().'/api/get-academic-year/'.$this->getInstituteId().'/'.$this->getCampusId();
        // return academic year profile
        return $this->myGuzzleRequest('GET', $url,  null);
    }
    
   
    //16.04.19 update
     //https:plm
    // get school academic year
    public function getDailyAttendance(){
        // call guzzle http client request
        $client = new Client();
        // academic level list url
        $url = $this->getEmsUrl().'/api/get-daily-attendance-report/'.$this->getInstituteId().'/'.$this->getCampusId();
        // get academic year profile
        try{
            return json_decode($client->request('GET', $url)->getBody()->getContents());
        }catch(Exception $e){
            return [];
        }
    }
    
    
    // get school academic level list
    public function getAcademicBatchList($levelId=null){
        // get academic year profile
        if($levelId AND $year = $this->getAcademicYear()){
            // json body information
            $json = ['institute'=>$this->getInstituteId(), 'campus'=>$this->getCampusId(), 'id'=>$levelId];
            // academic level list url
            $url = $this->getEmsUrl().'/api/get-academic-batch-list';
            // return academic level list
            return $this->myGuzzleRequest('POST', $url,  $json);
        }else{
            // return null
            return [];
        }
    }

    // get school academic level list
    public function getAcademicSectionList($sectionId=null){
        // get academic year profile
        if($sectionId AND $year = $this->getAcademicYear()){
            // json body information
            $json = ['institute'=>$this->getInstituteId(), 'campus'=>$this->getCampusId(), 'id'=>$sectionId];
            // academic level list url
            $url = $this->getEmsUrl().'/api/get-academic-section-list';
            // return academic level list
            return $this->myGuzzleRequest('POST', $url,  $json);
        }else{
            // return null
            return [];
        }
    }
    
    //End 16.04.19 update

    // get school academic year list
    public function getAcademicYearList(){
        // academic year list url
        $url = $this->getEmsUrl().'/api/get-academic-year-list/'.$this->getInstituteId().'/'.$this->getCampusId();
        // return academic year list
        return $this->myGuzzleRequest('GET', $url,  null);
    }

    // get school academic level list
    public function getAcademicLevelList(){
        // get academic year profile
        if($year = $this->getAcademicYear()){
            // json body information
            $json = ['institute'=>$this->getInstituteId(), 'campus'=>$this->getCampusId(), 'id'=>$year->id];
            // academic level list url
            $url = $this->getEmsUrl().'/api/get-academic-level-list';
            // return academic level list
            return $this->myGuzzleRequest('POST', $url,  $json);
        }else{
            // return null
            return null;
        }
    }
    
    
    // get online admission state
    public function getStateList(){
        // call guzzle http client request
        $client = new Client();
        // academic level list url
        $url = $this->getEmsUrl().'/api/get-state-list/';
        // get academic year profile
        try{
            return json_decode($client->request('GET', $url)->getBody()->getContents());
        }catch(\Exception $e){
            // return null
            return [];
        }
       
    }

    // get online admission city id form route
    public function getCityList($stateId){
       // call guzzle http client request
        $client = new Client();
        // url 
        $url = $this->getEmsUrl().'/api/get-city-list/'.$stateId;
        // get academic year profile
        try{
            return json_decode($client->request('GET', $url)->getBody()->getContents());
        }catch(\Exception $e){
            return [];
        }
        
    }
    
///////////////...........Start Online Admission student Helaper Method.....///////
    // online student data store
    public function storeOnlineStudent($dataArrayList){
        // data conversion
        $json = (array)$dataArrayList;
        // checking json
        if(!empty($json) AND count($json)>0){
            // client 
            $client = new Client();
            // // result url
            $url = $this->getEmsUrl().'/api/store-online-student';
            return json_decode($client->request('POST', $url, ['json' => $json])->getBody()->getContents());
        }else{
            // return null
            return [];
        }
    }

    // get Applicant Data
    public function getApplicantData($json){
        // get academic year profile
        if($this->getAcademicYear()){
            // call guzzle http client request
            $client = new Client();
            // academic level list url
            $url = $this->getEmsUrl().'/api/applicant-user-login';
            // return academic level list
            try{
                return $response = json_decode($client->request('POST', $url, ['json' => $json], ['timeout' => 3, 'connect_timeout' => 3])->getBody()->getContents());
            }catch(Exception $e){
                // return null
                return [];
            }
        
        }else{
            // return null
            return [];
        }
    }
///////////////...........END Online Admission student Helaper Method...../////// 
    

    // get school batch section student list
    public function getBatchSectionStudentList($json){
        // checking json
        if(!empty($json) AND count($json)>0){
            // student list url
            $url = $this->getEmsUrl().'/api/get-student-list';
            // return student list
            return $this->myGuzzleRequest('POST', $url,  $json);
        }else{
            // return null
            return null;
        }
    }

    // get school employee list
    public function getEmployeeList($json){
        // checking json
        if(!empty($json) AND count($json)>0){
            // employee list url
            $url = $this->getEmsUrl().'/api/get-employee-list';
            // return employee list
            return $this->myGuzzleRequest('POST', $url,  $json);
        }else{
            // return null
            return null;
        }
    }

    // get school batch section class routine
    public function getBatchSectionClassRoutine($json){
        // checking json
        if(!empty($json) AND count($json)>0){
            // timetable url
            $url = $this->getEmsUrl().'/api/get-academic-batch-section-timetable';
            // return academic level list
            return $this->myGuzzleRequest('POST', $url,  $json);
        }else{
            // return null
            return null;
        }
    }

    // get single student semester result
    public function getSingleStudentSemesterResult($json){
        // checking json
        if(!empty($json) AND count($json)>0){
            // result url
            $url = $this->getEmsUrl().'/api/get-academic-single-student-result';
            // return academic level list
            return $this->myGuzzleRequest('POST', $url,  $json);
        }else{
            // return null
            return null;
        }
    }

    // get academic notice list
    public function getAcademicNoticeList($json){
        // checking json
        if(!empty($json) AND count($json)>0){
            // result url
            $url = $this->getEmsUrl().'/api/get-academic-notice-list';
            // return academic level list
            return $this->myGuzzleRequest('POST', $url,  $json);
        }else{
            // return null
            return null;
        }
    }


    // get academic class topper list
    public function getAcademicClassTopperList(){
        // get academic year profile
        if($this->getAcademicYear()){
            // academic level list url
            $url = $this->getEmsUrl().'/api/get-class-topper-list/'.$this->getInstituteId().'/'.$this->getCampusId();
            // return academic level list
            return $this->myGuzzleRequest('GET', $url, null);
        }else{
            // return null
            return null;
        }
    }

    // guzzle client request
    public static function myGuzzleRequest($method, $url, $json)
    {
        // call guzzle http client request
        $client = new Client();
        // checking method
        if($method=='GET'){
            // request response
            $response = json_decode($client->request('GET', $url)->getBody()->getContents());
        }else{
            // request response
            $response = json_decode($client->request('POST', $url, ['json' => $json])->getBody()->getContents());
        }
        // checking status
        if($response->status=='success'){
            // request data
            $requestData = $response->data;
        }else{
            // request data
            $requestData = null;
        }
        // return request data
        return $requestData;
    }

    // get institute id
    public static function getInstituteId()
    {
        // institute id
        $instituteId = env('INSTITUTE_ID');
        // return institute id
        return $instituteId;
    }

    // get institute id
    public static function getCampusId()
    {
        // campus id
        $campusId = env('CAMPUS_ID');
        // return campus id
        return $campusId;
    }

    // get institute id
    public static function getEmsUrl()
    {
        // ems url
        $url = env('EMS_URL');
        // return ems url
        return $url;
    }
}
