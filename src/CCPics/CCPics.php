<?php
/**
 * A page controller to display a page, for example an about-page, displays content labelled as "page".
 * 
* @package LydiaCore
 */
class CCPics extends CObject implements IController {


	private $picParth;
  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
   
  }

  
        /**
   * Implementing interface IController. All controllers must have an index action.
   */
  public function Index($id=null) {    
    $pictures = new CMPics($id);
    $this->views->SetTitle('Bilder');
    $this->views->AddInclude(__DIR__ . '/index.tpl.php', array('pictures' => $pictures->listAll(),'usercheck' => $this->session->GetAuthenticatedUser(),), 'primary');

  }
  
  public function init(){
  	  $this->views->SetTitle('init');
  	  $pictures = new CMPics();
  	  $pictures->Manage('install');
  }

  /**
   * Add pics.
   */
  public function addPics($id=null) {
   $pictures = new CMPics($id);
    $form = new CFormAddPics($pictures);
    $status = $form->Check();
    if($status === false) {
      $this->AddMessage('notice', 'The form could not be processed.');
      $this->RedirectToControllerMethod();
    } else if($status === true) {
      $this->RedirectToControllerMethod();
    }  

    $this->views->SetTitle('Page: '.htmlEnt($pictures['title']));
    $this->views->AddInclude(__DIR__ . '/addPic.tpl.php', array(
                  'contents' => $pictures,'usercheck' => $this->session->GetAuthenticatedUser(),
                  'entries'=>$pictures->ListAll(array('type'=>'komment', 'order-by'=>'type', 'order-order'=>'DESC')),'form'=>$form,
                ),'primary');
   }
   
   
 

} 


/**
 * Form for add pics
 */
class CFormAddPics extends CForm {

  /**
   * Properties
   */
  private $object;

  /**
   * Constructor
   */
  public function __construct($object) {
    parent::__construct();
    $this->object = $object;

    $this->AddElement(new CFormElementText('name', array('value'=>"")))
    	 ->AddElement(new CFormElementHidden('id', array('value'=>"")))
    	 ->AddElement(new CFormElementText('comments', array('value'=>"")))
    	 ->AddElement(new CFormElementText('sub', array('value'=>"")))
    	 ->AddElement(new CFormElementUpload('picture', array('value'=>"")))
    	 ->AddElement(new CFormElementTextarea('data', array('label'=>'Add picture info:')))
         ->AddElement(new CFormElementSubmit('Spara', array('callback'=>array($this, 'DoSave'), 'callback-args'=>array($object))));
  }
  
  /**
   * Callback to save the form picture to database.
   */
  public function DoSave($form, $pictures) {
    $pictures['id']    	      = $form['id']['value'];
    $pictures['name'] 	      = $form['name']['value'];
    $pictures['data']         = $form['data']['value'];
    $pictures['picture']      = $form['picture']['value'];
    $pictures['sub']          = $form['sub']['value'];
    $pictures['comments']     = $form['comments']['value'];
    

    	//behövs $method = " enctype='multipart/form-data' method='post'";
    	//i CForm.
	
	if($pictures['name']){
	$uploaddir = LYDIA_INSTALL_PATH . '/site/Pictures/';
	
	$uploadfile = $uploaddir . basename($_FILES['picture']['name']);
	if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)) {
	
	}
	 
		return $pictures->Save();

	}

  }

}





