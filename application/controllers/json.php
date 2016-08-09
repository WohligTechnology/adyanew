<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller
{function getallcareers()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`adya_careers`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`adya_careers`.`title`";
$elements[1]->sort="1";
$elements[1]->header="title";
$elements[1]->alias="title";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`adya_careers`.`experience`";
$elements[2]->sort="1";
$elements[2]->header="experience";
$elements[2]->alias="experience";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`adya_careers`.`qualification`";
$elements[3]->sort="1";
$elements[3]->header="qualification";
$elements[3]->alias="qualification";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`adya_careers`.`openings`";
$elements[4]->sort="1";
$elements[4]->header="openings";
$elements[4]->alias="openings";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`adya_careers`.`area`";
$elements[5]->sort="1";
$elements[5]->header="area";
$elements[5]->alias="area";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `adya_careers`");
$this->load->view("json",$data);
}
public function getsinglecareers()
{
$id=$this->input->get_post("id");
$data["message"]=$this->careers_model->getsinglecareers($id);
$this->load->view("json",$data);
}

public function getCareers()
{
// $id=$this->input->get_post("id");
$data["message"]=$this->careers_model->getCareers();
$this->load->view("json",$data);
}

public function contactSubmit()
{
  $data = json_decode(file_get_contents('php://input'), true);
  if(empty($data)){
    $data["message"]=0;
  }
  else{
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['number'];
    $message = $data['msg'];
    $data["message"]=$this->contact_model->contactSubmit($name,$email,$phone,$message);
  }
  $this->load->view("json",$data);
}
} ?>
