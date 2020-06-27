<?php
namespace App\Objects;

use App\OptionModel;

class Option {

    private $option_table;


    public function __construct() {
        $this->option_table = new OptionModel();
    }

    //================================================================
        
    public function choPhepDangKy()
    {
        $data = $this->option_table->where('optionName', '=', 'choPhepDangKy')->get();
        if( $data[0]["value"] != 0 )
          return true;
        else return false;
    }

    //================================================================
        
    public function choPhepChamDiem()
    {
        $data = $this->option_table->where('optionName', '=', 'choPhepChamDiem')->get();
        if( $data[0]["value"] != 0 )
          return true;
        else return false;
    }

    //================================================================


    public function cap_nhat_cai_dat( $data ) {
       try { 
          $choPhepDangKy = $this->option_table->where('optionName', '=', 'choPhepDangKy')->first();
           
          if( isset( $data["dang-ky"] ) && $data["dang-ky"] == "on"){
            $choPhepDangKy->value = 1; 
          }else $choPhepDangKy->value = 0;
          $choPhepDangKy->save();

          $choPhepChamDiem = $this->option_table->where('optionName', '=', 'choPhepChamDiem')->first();
           
          if( isset( $data["cham-diem"] ) && $data["cham-diem"] == "on"){
            $choPhepChamDiem->value = 1; 
          }else $choPhepChamDiem->value = 0;
          $choPhepChamDiem->save();   

          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }
}