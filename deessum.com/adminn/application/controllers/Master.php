<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function category($id=null,$mode=null){
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

            $category= $this->CRUDS_model->getdata("category",array('id'=>$id))->row();
            $datas['category'] =$category;
		}
		
		if($this->input->post()){
			$this->form_validation->set_rules('category_name',"",'trim|required',array('required'=>"Category name is missing "));

            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold">', '</span>');
            
			if($this->form_validation->run()==false){
                $this->load->view('Category',$datas);
            }else{
                
				$inputData = array(
                    'category_name'=>htmlspecialchars($this->input->post('category_name'))
                );

                if($this->input->post('id')!=null && $this->input->post('mode')=="EDiT"){
                    $condition=array('id'=>$this->input->post('id'));
                    $data = $this->CRUDS_model->update("category",$inputData,$condition);

                    if($data==1)
                        $this->session->set_flashdata('message','Category detail updated successfully ');
                    else
                        $this->session->set_flashdata('message','Category detail updation failed');

                        redirect(base_url('master/categoryList/'));
                }else{
					$inputData['c_dt']=date('Y-m-d h:i:s');
                    $data = $this->CRUDS_model->insert("category",$inputData);

                    if($data==1)
                        $this->session->set_flashdata('message','Category created successfully');
                    else
                        $this->session->set_flashdata('message','Category creation failed');

                    redirect(base_url('master/categoryList/'));
                }
            }
		}else{
			$this->load->view('Category',$datas);
		}
	}

	public function categoryList(){
		$accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();

		$datas['categories']=$this->CRUDS_model->getdata("category",array('flag'=>TRUE));
		$this->load->view("Category_list",$datas);
    }
	
	public function subCategory($id=null,$mode=null){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();

		if($mode==null){
            $datas['mode']=$this->input->post( "mode");
        }else{
            $datas['mode']=$mode;
		}
		$datas['categories']=$this->CRUDS_model->getdata("category",array("flag"=>TRUE));
        if($id!=NULL && $mode=="EDiT"){
            
            $sub_category= $this->CRUDS_model->getdata("sub_category",array('id'=>$id))->row();
            $datas['sub_category'] =$sub_category;
		}
		
		if($this->input->post()){
			$this->form_validation->set_rules('category_id',"",'trim|required',array('required'=>"Select category "));
			$this->form_validation->set_rules('sub_category',"",'trim|required',array('required'=>"Subcategory could not empty"));
            
            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold">', '</span>');
            
			if($this->form_validation->run()==false){
                $this->load->view('Sub_category',$datas);
            }else{
                
                $inputData = array(
                    'category_id'=>htmlspecialchars($this->input->post('category_id')),
                    'sub_category'=>htmlspecialchars($this->input->post('sub_category'))
				);

                if($this->input->post('id')!=null && $this->input->post('mode')=="EDiT"){
                    $condition=array('id'=>$this->input->post('id'));
                    $data = $this->CRUDS_model->update("sub_category",$inputData,$condition);
                    
                    if($data==1)
                    $this->session->set_flashdata('message','Sub category detail updated successfully ');
                    else
                        $this->session->set_flashdata('message','Sub category detail updation failed');
                        
                        redirect(base_url('master/subCategoryList/'));
                    }else{
                        $inputData['c_dt']=date('Y-m-d h:i:s');
                    $data = $this->CRUDS_model->insert("sub_category",$inputData);
                    
                    if($data==1)
                        $this->session->set_flashdata('message','Sub category created successfully');
                        else
                        $this->session->set_flashdata('message','Sub category creation failed');
                    redirect(base_url('master/subCategoryList/'));
                }
            }
		}else{
			$this->load->view('Sub_category',$datas);
		}
	}
    
	public function subCategoryList(){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();
        
		$this->load->model("Master_model");
		$datas['sub_categories']=$this->Master_model->getSubcategories();
		// echo "<pre>";
		// print_r($datas['sub_categories']->result());
		// echo "</pre>";
		// die();
		$this->load->view("Sub_category_list",$datas);
    }
    
	public function city($id=null,$mode=null){
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

            $city= $this->CRUDS_model->getdata("city",array('id'=>$id))->row();
            $datas['city'] =$city;
		}
		
		if($this->input->post()){
			$this->form_validation->set_rules('city_name',"",'trim|required',array('required'=>"City name is missing "));

            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold">', '</span>');
            
			if($this->form_validation->run()==false){
                $this->load->view('City',$datas);
            }else{
                
				$inputData = array(
                    'city_name'=>htmlspecialchars($this->input->post('city_name'))
                );

                if($this->input->post('id')!=null && $this->input->post('mode')=="EDiT"){
                    $condition=array('id'=>$this->input->post('id'));
                    $data = $this->CRUDS_model->update("city",$inputData,$condition);

                    if($data==1)
                        $this->session->set_flashdata('message','City detail updated successfully ');
                    else
                        $this->session->set_flashdata('message','City detail updation failed');

                        redirect(base_url('master/cityList/'));
                }else{
					$inputData['c_dt']=date('Y-m-d h:i:s');
                    $data = $this->CRUDS_model->insert("city",$inputData);

                    if($data==1)
                        $this->session->set_flashdata('message','City created successfully');
                    else
                        $this->session->set_flashdata('message','City creation failed');

                    redirect(base_url('master/cityList/'));
                }
            }
		}else{
			$this->load->view('City',$datas);
		}
	}

	public function cityList(){
		$accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();

		$datas['cities']=$this->CRUDS_model->getdata("city",array('flag'=>TRUE));
		$this->load->view("City_list",$datas);
    }
    
    public function locality($id=null,$mode=null){
		$accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();

		if($mode==null){
            $datas['mode']=$this->input->post( "mode");
        }else{
            $datas['mode']=$mode;
		}
        $datas['cities']=$this->CRUDS_model->getdata("city",array("flag"=>TRUE));
        
        if($id!=NULL && $mode=="EDiT"){

            $locality= $this->CRUDS_model->getdata("locality",array('id'=>$id))->row();
            $datas['locality'] =$locality;
		}
		
		if($this->input->post()){
			$this->form_validation->set_rules('city_id',"",'trim|required',array('required'=>"Select city "));
			$this->form_validation->set_rules('locality',"",'trim|required',array('required'=>"Locality could not empty"));

            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold">', '</span>');
            
			if($this->form_validation->run()==false){
                $this->load->view('Locality',$datas);
            }else{
                
				$inputData = array(
                    'city_id'=>htmlspecialchars($this->input->post('city_id')),
                    'locality'=>htmlspecialchars($this->input->post('locality'))
				);

                if($this->input->post('id')!=null && $this->input->post('mode')=="EDiT"){
                    $condition=array('id'=>$this->input->post('id'));
                    $data = $this->CRUDS_model->update("locality",$inputData,$condition);

                    if($data==1)
                        $this->session->set_flashdata('message','locality detail updated successfully ');
                    else
                        $this->session->set_flashdata('message','locality detail updation failed');

                        redirect(base_url('master/localityList/'));
                }else{
					$inputData['c_dt']=date('Y-m-d h:i:s');
                    $data = $this->CRUDS_model->insert("locality",$inputData);

                    if($data==1)
                        $this->session->set_flashdata('message','locality created successfully');
                    else
                        $this->session->set_flashdata('message','locality creation failed');
                    redirect(base_url('master/localityList/'));
                }
            }
		}else{
			$this->load->view('Locality',$datas);
		}
	}

	public function localityList(){
		$accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();

		$this->load->model("Master_model");
		$datas['localities']=$this->Master_model->getLocalities();

		$this->load->view("Locality_list",$datas);
    }

    public function brand($id=null,$mode=null){
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

            $brand= $this->CRUDS_model->getdata("brand",array('id'=>$id))->row();
            $datas['brand'] =$brand;
		}
		
		if($this->input->post()){
			$this->form_validation->set_rules('name',"",'trim|required',array('required'=>"Brand name is missing "));
			$this->form_validation->set_rules('discount_percentage',"",'trim|required|numeric',array('required'=>"Discount percentage missing","numeric"=>"Discount percentage should be number"));

            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold">', '</span>');
            
			if($this->form_validation->run()==false){
                $this->load->view('Brand',$datas);
            }else{
                
				$inputData = array(
                    'name'=>htmlspecialchars($this->input->post('name')),
                    'discount_percentage'=>htmlspecialchars($this->input->post('discount_percentage'))
                );

                if($this->input->post('id')!=null && $this->input->post('mode')=="EDiT"){
                    $condition=array('id'=>$this->input->post('id'));
                    $data = $this->CRUDS_model->update("brand",$inputData,$condition);

                    if($data==1)
                        $this->session->set_flashdata('message','Brand detail updated successfully ');
                    else
                        $this->session->set_flashdata('message','Brand detail updation failed');

                        redirect(base_url('master/brandList/'));
                }else{
					$inputData['c_dt']=date('Y-m-d h:i:s');
                    $data = $this->CRUDS_model->insert("brand",$inputData);

                    if($data==1)
                        $this->session->set_flashdata('message','Brand created successfully');
                    else
                        $this->session->set_flashdata('message','Brand creation failed');

                    redirect(base_url('master/brandList/'));
                }
            }
		}else{
			$this->load->view('Brand',$datas);
		}
    }
    
    public function brandList(){
		$accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();

		$datas['brands']=$this->CRUDS_model->getdata("brand",array('flag'=>TRUE));
		$this->load->view("Brand_list",$datas);
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

            $slider= $this->CRUDS_model->getdata("slider",array('id'=>$id))->row();
            $datas['slider'] =$slider;
		}
		
		if($this->input->post()){
			$this->form_validation->set_rules('product_id',"",'trim|required',array('required'=>"Category name is missing "));
			$this->form_validation->set_rules('uploaded_file_name',"",'trim|required',array('required'=>"Category name is missing "));

            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold">', '</span>');
            
			if($this->form_validation->run()==false){
                $this->load->view('Slider',$datas);
            }else{
                
				$inputData = array(
                    'product_id'=>htmlspecialchars($this->input->post('product_id')),
                    'image'=>htmlspecialchars($this->input->post('uploaded_file_name'))
                );

                if($this->input->post('id')!=null && $this->input->post('mode')=="EDiT"){
                    $condition=array('id'=>$this->input->post('id'));
                    $data = $this->CRUDS_model->update("slider",$inputData,$condition);

                    if($data==1)
                        $this->session->set_flashdata('message','Slider updated successfully ');
                    else
                        $this->session->set_flashdata('message','Slider detail updation failed');

                        redirect(base_url('master/sliderList/'));
                }else{
					$inputData['c_dt']=date('Y-m-d h:i:s');
                    $data = $this->CRUDS_model->insert("slider",$inputData);

                    if($data==1)
                        $this->session->set_flashdata('message','Slider created successfully');
                    else
                        $this->session->set_flashdata('message','Slider creation failed');

                    redirect(base_url('master/sliderList/'));
                }
            }
		}else{
			$this->load->view('Slider',$datas);
		}
    }
    
    public function uploadSliderImage(){
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
            $output = Slim::saveFile($data, $name,"slider_images/");
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
            $input = Slim::saveFile($data, $name,"slider_images/");

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

    public function sliderList(){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        $this->load->model("Master_model");
		$datas['sliders']=$this->Master_model->getSliders();
		$this->load->view("Slider_list",$datas);
    }


}