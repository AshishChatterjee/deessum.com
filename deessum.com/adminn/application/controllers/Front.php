<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function socialMedia($id=null,$mode=null){
		$accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();

		if($mode==null){
            $datas['mode']=$this->input->post( "mode");
        }else{
            $datas['mode']=$mode;
        }
        if($id!=NULL && $mode=="EDiT"){

            $media= $this->CRUDS_model->getdata("social_media_links",array('id'=>$id))->row();
            $datas['media'] =$media;
        }
        
		
		if($this->input->post()){
			$this->form_validation->set_rules('name',"",'trim|required',array('required'=>"Name is missing"));
			$this->form_validation->set_rules('link',"",'trim|required',array('required'=>"Link is missing"));
			$this->form_validation->set_rules('uploaded_file_name',"",'trim|required',array('required'=>"Upload media image"));
            
            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold">', '</span>');
            
			if($this->form_validation->run()==false){
                $this->load->view('Social_media_links',$datas);
            }else{
                
				$inputData = array(
                    'name'=>htmlspecialchars($this->input->post('name')),
                    'link'=>htmlspecialchars($this->input->post('link')),
                    'image'=>htmlspecialchars($this->input->post('uploaded_file_name'))
                );

                if($this->input->post('id')!=null && $this->input->post('mode')=="EDiT"){
                    $condition=array('id'=>$this->input->post('id'));
                    $data = $this->CRUDS_model->update("social_media_links",$inputData,$condition);

                    if($data==1)
                        $this->session->set_flashdata('message','Social media detail updated successfully ');
                    else
                        $this->session->set_flashdata('message','Social media detail updation failed');

                        redirect(base_url('front/socialMediaList/'));
                }else{
					$inputData['c_dt']=date('Y-m-d h:i:s');
                    $id = $this->CRUDS_model->insert("social_media_links",$inputData);

                    if($id!=0){
                        $this->session->set_flashdata('message','Social media link created');
                    }
                    else
                        $this->session->set_flashdata('message','Social media link created failed');

                    redirect(base_url('front/socialMediaList/'));
                }
            }
		}else{
			$this->load->view('Social_media_links',$datas);
		}
    }

    public function uploadFrontImage(){
        // Uncomment if you want to allow posts from other domains
        // header('Access-Control-Allow-Origin: *');
        $this->load->view('slim');
        // Get posted data, if something is wrong, exit
        try {
            $images = Slim::getImages();
        }
        catch (Exception $e) {

            // Possible solutions
            // ----------
            // Make sure you're running PHP version 5.6 or higher

            Slim::outputJSON(array(
                'status' => SlimStatus::FAILURE,
                'message' => 'Unknown'
            ));

            return;
        }

        // No image found under the supplied input name
        if ($images === false) {

            // Possible solutions
            // ----------
            // Make sure the name of the file input is "slim[]" or you have passed your custom
            // name to the getImages method above like this -> Slim::getImages("myFieldName")

            Slim::outputJSON(array(
                'status' => SlimStatus::FAILURE,
                'message' => 'No data posted'
            ));

            return;
        }

        // Should always be one image (when posting async), so we'll use the first on in the array (if available)
        $image = array_shift($images);

        // Something was posted but no images were found
        if (!isset($image)) {

            // Possible solutions
            // ----------
            // Make sure you're running PHP version 5.6 or higher

            Slim::outputJSON(array(
                'status' => SlimStatus::FAILURE,
                'message' => 'No images found'
            ));

            return;
        }

        // If image found but no output or input data present
        if (!isset($image['output']['data']) && !isset($image['input']['data'])) {

            // Possible solutions
            // ----------
            // If you've set the data-post attribute make sure it contains the "output" value -> data-post="actions,output"
            // If you want to use the input data and have set the data-post attribute to include "input", replace the 'output' String above with 'input'

            Slim::outputJSON(array(
                'status' => SlimStatus::FAILURE,
                'message' => 'No image data'
            ));

            return;
        }



        // if we've received output data save as file
        if (isset($image['output']['data'])) {

            // get the name of the file
            $name = $image['output']['name'];

            // get the crop data for the output image
            $data = $image['output']['data'];

            // If you want to store the file in another directory pass the directory name as the third parameter.
            // $output = Slim::saveFile($data, $name, 'my-directory/');

            // If you want to prevent Slim from adding a unique id to the file name add false as the fourth parameter.
            // $output = Slim::saveFile($data, $name, 'tmp/', false);

            // Default call for saving the output data
            $output = Slim::saveFile($data, $name,"front_image/");
        }

        // if we've received input data (do the same as above but for input data)
        if (isset($image['input']['data'])) {

            // get the name of the file
            $name = $image['input']['name'];

            // get the crop data for the output image
            $data = $image['input']['data'];

            // If you want to store the file in another directory pass the directory name as the third parameter.
            // $input = Slim::saveFile($data, $name, 'my-directory/');

            // If you want to prevent Slim from adding a unique id to the file name add false as the fourth parameter.
            // $input = Slim::saveFile($data, $name, 'tmp/', false);

            // Default call for saving the input data
            $input = Slim::saveFile($data, $name,"front_image/");

        }



        //
        // Build response to client
        //
        $response = array(
            'status' => SlimStatus::SUCCESS
        );

        if (isset($output) && isset($input)) {

            $response['output'] = array(
                'file' => $output['name'],
                'path' => $output['path']
            );

            $response['input'] = array(
                'file' => $input['name'],
                'path' => $input['path']
            );

        }
        else {
            $response['file'] = isset($output) ? $output['name'] : $input['name'];
            $response['path'] = isset($output) ? $output['path'] : $input['path'];
        }

        // Return results as JSON String
        Slim::outputJSON($response);
    }

    public function socialMediaList(){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        

		$datas['medias']=$this->CRUDS_model->getdata("social_media_links",array("flag"=>TRUE));
		$this->load->view("Social_media_list",$datas);
    }

    public function slider($id=null,$mode=null){
		$accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();

		if($mode==null){
            $datas['mode']=$this->input->post( "mode");
        }else{
            $datas['mode']=$mode;
        }
        if($id!=NULL && $mode=="EDiT"){

            $slider= $this->CRUDS_model->getdata("site_slider",array('id'=>$id))->row();
            $datas['slider'] =$slider;
        }
        
		
		if($this->input->post()){
			$this->form_validation->set_rules('title',"",'trim|required',array('required'=>"Text missing"));
			$this->form_validation->set_rules('sub_title',"",'trim|required',array('required'=>"Text missing"));
			$this->form_validation->set_rules('description',"",'trim|required',array('required'=>"Text missing"));
			$this->form_validation->set_rules('uploaded_file_name',"",'trim|required',array('required'=>"Upload media image"));
            
            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold">', '</span>');
            
			if($this->form_validation->run()==false){
                $this->load->view('Slider_front',$datas);
            }else{
                
				$inputData = array(
                    'title'=>htmlspecialchars($this->input->post('title')),
                    'sub_title'=>htmlspecialchars($this->input->post('sub_title')),
                    'description'=>htmlspecialchars($this->input->post('description')),
                    'image'=>htmlspecialchars($this->input->post('uploaded_file_name'))
                );

                if($this->input->post('id')!=null && $this->input->post('mode')=="EDiT"){
                    $condition=array('id'=>$this->input->post('id'));
                    $data = $this->CRUDS_model->update("site_slider",$inputData,$condition);

                    if($data==1)
                        $this->session->set_flashdata('message','Social media detail updated successfully ');
                    else
                        $this->session->set_flashdata('message','Social media detail updation failed');

                        redirect(base_url('front/sliderList/'));
                }else{
					$inputData['c_dt']=date('Y-m-d h:i:s');
                    $id = $this->CRUDS_model->insert("site_slider",$inputData);

                    if($id!=0){
                        $this->session->set_flashdata('message','Social media link created');
                    }
                    else
                        $this->session->set_flashdata('message','Social media link created failed');

                    redirect(base_url('front/sliderList/'));
                }
            }
		}else{
			$this->load->view('Slider_front',$datas);
		}
    }

    public function sliderList(){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        

		$datas['sliders']=$this->CRUDS_model->getdata("site_slider",array("flag"=>TRUE));
		$this->load->view("Slider_list_front",$datas);
    }
}