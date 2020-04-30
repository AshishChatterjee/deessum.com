<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function product($id=null,$mode=null){
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

            $product= $this->CRUDS_model->getdata("product",array('id'=>$id))->row();
            $datas['product'] =$product;
        }
        
        $datas['brands']=$this->CRUDS_model->getdata('brand',array('flag'=>TRUE));
        $datas['categories']=$this->CRUDS_model->getdata('category',array('flag'=>TRUE));
        $datas['retailers']=$this->CRUDS_model->getdata('retailer',array('flag'=>TRUE));
		
		if($this->input->post()){
			$this->form_validation->set_rules('name',"",'trim|required',array('required'=>"Product name is missing "));
			$this->form_validation->set_rules('brand_id',"",'trim|required',array('required'=>"Brand name is missing "));
			$this->form_validation->set_rules('category_id',"",'trim|required',array('required'=>"Category name is missing "));
			// $this->form_validation->set_rules('sub_category_id',"",'trim|required',array('required'=>"Sub Category name is missing "));
			$this->form_validation->set_rules('uploaded_file_name',"",'trim|required',array('required'=>"First upload product image "));
			$this->form_validation->set_rules('mrp',"",'trim|required',array('required'=>"MRP is missing "));
			$this->form_validation->set_rules('selling_price',"",'trim|required',array('required'=>"Selling Price is missing "));
            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold">', '</span>');
            
			if($this->form_validation->run()==false){
                $cat_id=$this->input->post("category_id");
                if(isset($cat_id) && $cat_id!=""){
                    $datas['sub_categories']=$this->CRUDS_model->getdata("sub_category",array("flag"=>TRUE,"category_id"=>$cat_id));
                }
                $this->load->view('Product',$datas);
            }else{
                
				$inputData = array(
                    'name'=>htmlspecialchars($this->input->post('name')),
                    'brand_id'=>htmlspecialchars($this->input->post('brand_id')),
                    'category_id'=>htmlspecialchars($this->input->post('category_id')),
                    // 'sub_category_id'=>htmlspecialchars($this->input->post('sub_category_id')),
                    'image'=>htmlspecialchars($this->input->post('uploaded_file_name')),
                    'mrp'=>htmlspecialchars($this->input->post('mrp')),
                    'selling_price'=>htmlspecialchars($this->input->post('selling_price'))
                );

                if($this->input->post('id')!=null && $this->input->post('mode')=="EDiT"){
                    $condition=array('id'=>$this->input->post('id'));
                    $data = $this->CRUDS_model->update("product",$inputData,$condition);

                    if($data==1)
                        $this->session->set_flashdata('message','Product detail updated successfully ');
                    else
                        $this->session->set_flashdata('message','Product detail updation failed');

                        redirect(base_url('product/product/'));
                }else{
					$inputData['c_dt']=date('Y-m-d h:i:s');
                    $data = $this->CRUDS_model->insert("product",$inputData);

                    if($data==1)
                        $this->session->set_flashdata('message','Product created successfully');
                    else
                        $this->session->set_flashdata('message','Product creation failed');

                    redirect(base_url('product/product/'));
                }
            }
		}else{
			$this->load->view('Product',$datas);
		}
    }

    public function productInputSource($id=null,$mode=null){
		$accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();
        
        $datas['retailers']=$this->CRUDS_model->getdata('retailer',array('flag'=>TRUE));

		if($mode==null){
            $datas['mode']=$this->input->post( "mode");
        }else{
            $datas['mode']=$mode;
        }
        if($id!=NULL && $mode=="EDiT"){

            $product= $this->CRUDS_model->getdata("product",array('id'=>$id))->row();
            $datas['product'] =$product;
        }
        
        $datas['brands']=$this->CRUDS_model->getdata('brand',array('flag'=>TRUE));
        $datas['categories']=$this->CRUDS_model->getdata('category',array('flag'=>TRUE));
		
		if($this->input->post()){
			$this->form_validation->set_rules('holder',"",'trim|required',array('required'=>"Category name is missing "));

            $this->form_validation->set_error_delimiters('<span style="color:#A00000; font-size:12px; margin:0; padding:0;" class="normal-text-bold">', '</span>');
            
			if($this->form_validation->run()==false){
                $cat_id=$this->input->post("category_id");
                if(isset($cat_id) && $cat_id!=""){
                    $datas['sub_categories']=$this->CRUDS_model->getdata("sub_category",array("flag"=>TRUE,"category_id"=>$cat_id));
                }
                $this->load->view('Product',$datas);
            }
		}else{
			$this->load->view('Product',$datas);
		}
    }

    public function uploadProductImage(){
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
            $output = Slim::saveFile($data, $name,"product_images/");
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
            $input = Slim::saveFile($data, $name,"product_images/");

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

    public function productList(){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
		$datas['member']=$this->common_data_lib->memberDetails();
        $this->load->model("Product_model");
		$datas['products']=$this->Product_model->getProducts();
		$this->load->view("Product_list",$datas);
    }

    public function profile($product_id=null){
        $accesses=[7]; // Universal Access
        $this->chk_access_lib->chkAccess($accesses);
		$datas=null;
        $datas['member']=$this->common_data_lib->memberDetails();

        if($product_id!=null){
            $this->load->model('Product_model');
            $product=$this->Product_model->getProducts($product_id);
            if($product->num_rows()>0){
                $datas['product']=$product->row();
                $this->load->view("Product_profile",$datas);
            }else{
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

}