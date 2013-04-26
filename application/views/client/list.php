<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chukkapun
 * Date: 23/4/2556
 * Time: 23:22 น.
 * To change this template use File | Settings | File Templates.
 */

?>

<?php
$this->load->view('header');
?>
<form id="form1" name="form1" method="post" action="">
    <label>ชื่อบริษัท
        <input type="text" name="textfield" />
    </label>
    <label>ประเภทบริษัท
        <select name="select">
        </select>
    </label>
    <p>
        <label>ผู้ติดต่อประสานงาน
            <select name="select2">
            </select>
        </label>
        <label>วันที่สร้างข้อมูล
            <input type="text" name="textfield2" />
        </label>
    </p>
    <p>
        <label>วันที่แก้ไขข้อมูล
            <input type="text" name="textfield3" />
        </label>
    </p>
    <p>
        <input type="button" value="search" />
    </p>
</form>
<a href="<?php echo base_url(). 'index.php/client/clientNew'; ?>">เพิ่มข้อมูลใหม่</a>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
################################################################################
## +---------------------------------------------------------------------------+
## | 1. Creating & Calling:                                                    |
## +---------------------------------------------------------------------------+
##  *** define a relative (virtual) path to datagrid.class.php file
##  *** (relatively to the current file)
##  *** RELATIVE PATH ONLY ***
define("DATAGRID_DIR", APPPATH ."libraries/datagrid/");                     /* Ex.: "datagrid/" */
//var_dump (DATAGRID_DIR);
require_once(DATAGRID_DIR.'datagrid.class.php');

// includes database connection parameters
//include_once('lib/base.inc.php');

$DB_HOST = $this->db->hostname;
$DB_NAME = $this->db->database;
$DB_USER = $this->db->username;
$DB_PASS = $this->db->password;

ob_start();
##  *** set needed options
$debug_mode = true;
$messaging = true;
$unique_prefix = "f_";
$dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix);

##  *** set data source with needed options
##  *** put a primary key on the first place
$sql="
    SELECT
    *
    FROM company
    WHERE 1
";
$default_order = array("id"=>"ASC");
$dgrid->DataSource("PEAR", "mysql", $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS, $sql, $default_order);

$dg_caption = '<b>Simplest ApPHP DataGrid</b> - <a href=index.php>Back to Index</a>';
$dgrid->SetCaption($dg_caption);

## +---------------------------------------------------------------------------+
## | 2. General Settings:                                                      |
## +---------------------------------------------------------------------------+
## +-- PostBack Submission Method ---------------------------------------------+
##  *** defines postback submission method for DataGrid: AJAX, POST(default) or GET
$postback_method = 'AJAX';
$dgrid->SetPostBackMethod($postback_method);
##
## +-- Cache Settings ---------------------------------------------------------+
## *** make sure your tmp/cache/ dir has 755 (write) permissions
## *** define caching parameters: 1st - allow caching or not, 2nd - caching lifetime in minutes
/// $dgrid->SetCachingParameters(true, 5);
## *** delete all caching pages (only if needed)
/// $dgrid->DeleteCache();
##
## +-- Languages --------------------------------------------------------------+
##  *** set interface language (default - English)
##  *** (ar) - Arabic     (bg) - Bulgarian        (ca) - Catala    (ch) - Chinese
##  *** (cz) - Czech      (da) - Danish           (de) - German    (en) - English
##  *** (es) - Espanol    (fi) - Finnish, Suomi   (fr) - Francais  (gk) - Greek
##  *** (he) - Hebrew     (hr) - Bosnian/Croatian (hu) - Hungarian (it) - Italian
##  *** (ja) - Japanese   (lt) - Lithuanian       (nl) - Netherlands/'Vlaams'(Flemish)
##  *** (pl) - Polish     (pb) - Br.Portuguese    (ro) - Romanian  (ko) - Korean
##  *** (ru) - Russian    (se) - Swedish          (sr) - Serbian   (tr) - Turkish
/// $dg_language = 'en';
/// $dgrid->SetInterfaceLang($dg_language);
##  *** set direction: 'ltr' or 'rtr' (default - 'ltr')
/// $direction = 'ltr';
/// $dgrid->SetDirection($direction);
##
## +-- Layouts, Templates & CSS -----------------------------------------------+
##  *** datagrid layouts: '0' - tabular(horizontal) - default, '1' - columnar(vertical), '2' - customized
##  *** use 'view'=>'0' and 'edit'=>'0' only if you work on the same tables
##  *** filter layouts: '0' - tabular(horizontal) - default, '1' - columnar(vertical), '2' - advanced(inline)
/// $layouts = array('view'=>'0', 'edit'=>'1', 'details'=>'1', 'filter'=>'1');
/// $dgrid->SetLayouts($layouts);
/// *** $mode_template = array('header'=>'', 'body'=>'', 'footer'=>'');
/// @field_name_1@ - field header
/// {field_name_1} - field value
/// [ADD][CREATE][EDIT][DELETE][BACK][CANCEL][UPDATE][MULTIROW_CHECKBOX][ROWS_NUMERATION] - allowed elements and operations (must be placed in $template['body'] only)
/// $view_template = '';
/// $add_edit_template = '';
/// $details_template = array('header'=>'', 'body'=>'', 'footer'=>'');
/// $details_template['header'] = '';
/// $details_template['body'] = '<table><tr><td>{field_name_1}</td><td>{field_name_2}</td></tr><tr><td>[BACK]</td></tr></table>';
/// $details_template['footer'] = '';
/// $dgrid->SetTemplates($view_template, $add_edit_template, $details_template);
##  *** set modes operations ('type' => 'link|button|image')
##  *** 'view' - view mode, 'edit' - add/edit/details modes,
##  *** 'byFieldValue'=>'fieldName' - make the field to be a link to edit mode page
/// $modes = array(
///     'add'	  =>array('view'=>true, 'edit'=>false, 'type'=>'link',  'show_button'=>true, 'show_add_button'=>'inside|outside'),
///     'edit'	  =>array('view'=>true, 'edit'=>true,  'type'=>'link',  'show_button'=>true, 'byFieldValue'=>''),
///     'details' =>array('view'=>true, 'edit'=>false, 'type'=>'link',  'show_button'=>true),
///     'delete'  =>array('view'=>true, 'edit'=>true,  'type'=>'image', 'show_button'=>true)
/// );
/// $dgrid->SetModes($modes);
##  *** set CSS class for datagrid
##  *** 'default|blue|gray|green|pink|empty|x-blue|x-gray|x-green' or your own css style
$css_class = 'pink';
$dgrid->SetCssClass($css_class);
##  *** set DataGrid caption
//$dg_caption = 'My Favorite Lovely ApPHP DataGrid';
//$dgrid->SetCaption($dg_caption);
##
## +-- Scrolling --------------------------------------------------------------+
##  *** allow scrolling on datagrid
/// $scrolling_option = false;
/// $dgrid->AllowScrollingSettings($scrolling_option);
##  *** set scrolling settings (optional)
/// $scrolling_height = '100px'; /* ex.: '190px' or '190' */
/// $dgrid->SetScrollingSettings($scrolling_height);
##
## +-- Multirow Operations ----------------------------------------------------+
##  *** allow multirow operations
/// $multirow_option = true;
/// $dgrid->AllowMultirowOperations($multirow_option);
/// $multirow_operations = array(
///     'edit'    => array('view'=>true),
///     'details' => array('view'=>true),
///     'clone'   => array('view'=>false),
///     'delete'  => array('view'=>true),
///     'my_operation_name' => array('view'=>true, 'flag_name'=>'my_flag_name', 'flag_value'=>'my_flag_value', 'tooltip'=>'Do something with selected', 'image'=>'image.gif')
/// );
/// $dgrid->SetMultirowOperations($multirow_operations);
##
## +-- Passing parameters & setting up other DataGrids ------------------------+
##  *** set variables that used to get access to the page (like: my_page.php?act=34&id=56 etc.)
/// $http_get_vars = array('act', 'id');
/// $dgrid->SetHttpGetVars($http_get_vars);
##  *** set other datagrid/s unique prefixes (if you use few datagrids on one page)
##  *** format (in which mode to allow processing of another datagrids)
##  *** array('unique_prefix'=>array('view'=>true|false, 'edit'=>true|false, 'details'=>true|false));
/// $anotherDatagrids = array('abcd_'=>array('view'=>true, 'edit'=>true, 'details'=>true));
/// $dgrid->SetAnotherDatagrids($anotherDatagrids);

##  *** set printing option: true(default) or false
$multirow_option = true;
$dgrid->AllowMultirowOperations($multirow_option);
$printing_option = false;
$dgrid->AllowPrinting($printing_option);


## +---------------------------------------------------------------------------+
## | 4. Sorting & Paging Settings:                                             |
## +---------------------------------------------------------------------------+
##  *** set sorting option: true(default) or false
$sorting_option = true;
$dgrid->AllowSorting($sorting_option);
##  *** set paging option: true(default) or false
$paging_option = true;
$rows_numeration = false;
$numeration_sign = 'N #';
$dropdown_paging = false;
$dgrid->AllowPaging($paging_option, $rows_numeration, $numeration_sign, $dropdown_paging);
##  *** set paging settings
$bottom_paging = array('results'=>true, 'results_align'=>'left', 'pages'=>true, 'pages_align'=>'center', 'page_size'=>true, 'page_size_align'=>'right');
$top_paging = array('results'=>true, 'results_align'=>'left', 'pages'=>true, 'pages_align'=>'center', 'page_size'=>true, 'page_size_align'=>'right');
$pages_array = array('10'=>'10', '25'=>'25', '50'=>'50', '100'=>'100', '250'=>'250', '500'=>'500', '1000'=>'1000');
$default_page_size = 50;
$paging_arrows = array('first'=>'|&lt;&lt;', 'previous'=>'&lt;&lt;', 'next'=>'&gt;&gt;', 'last'=>'&gt;&gt;|');
$dgrid->SetPagingSettings($bottom_paging, $top_paging, $pages_array, $default_page_size, $paging_arrows);

## +---------------------------------------------------------------------------+
## | 6. View Mode Settings:                                                    |
## +---------------------------------------------------------------------------+
##  *** set view mode table properties
$vm_table_properties = array('width'=>'100%');
$dgrid->SetViewModeTableProperties($vm_table_properties);
##  *** set columns in view mode
##  *** Ex.: 'on_js_event'=>'onclick="alert(\'Yes!!!\');"'
##  ***      'barchart' : number format in SELECT SQL must be equal with number format of max_value
// $fill_from_array = array('0'=>'Banned', '1'=>'Active', '2'=>'Closed', '3'=>'Removed'); /* as 'value'=>'option' */
// $vm_columns = array(
//     'ip_address'=>array('header'=>'TEST', 'type'=>'label',      'align'=>'left'), //'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
//     'is_enabled'=>array('header'=>'Enable', 'type'=>'label', "0" =>"disable", "1" => "enable"),//      'align'=>'left', 'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>'', 'target_path'=>'uploads/', 'default'=>'', 'image_width'=>'50px', 'image_height'=>'30px', 'linkto'=>'', 'magnify'=>'false', 'magnify_type'=>'popup|magnifier|lightbox', 'magnify_power'=>'2'),
//     'FieldName_3'=>array('header'=>'Name_C', 'type'=>'linktoview', 'align'=>'left', 'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
//     'FieldName_4'=>array('header'=>'Name_D', 'type'=>'linktoedit', 'align'=>'left', 'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
//     'FieldName_5'=>array('header'=>'Name_E', 'type'=>'linktodelete', 'align'=>'left', 'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
//     'FieldName_6'=>array('header'=>'Name_F', 'type'=>'link',       'align'=>'left', 'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>'', 'field_key'=>'field_name_0', 'field_key_1'=>'field_name_1', 'field_data'=>'field_name_2', 'rel'=>'', 'title'=>'', 'target'=>'_self', 'href'=>'{0}'),
//     'FieldName_7'=>array('header'=>'Name_G', 'type'=>'link',       'align'=>'left', 'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>'', 'field_key'=>'field_name_0', 'field_key_1'=>'field_name_1', 'field_data'=>'field_name_2', 'rel'=>'', 'title'=>'', 'target'=>'_self', 'href'=>'mailto:{0}'),
//     'FieldName_8'=>array('header'=>'Name_H', 'type'=>'link',       'align'=>'left', 'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>'', 'field_key'=>'field_name_0', 'field_key_1'=>'field_name_1', 'field_data'=>'field_name_2', 'rel'=>'', 'title'=>'', 'target'=>'_self', 'href'=>'http://mydomain.com?act={0}&act={1}&code=ABC'),
//     'FieldName_9'=>array('header'=>'Name_I', 'type'=>'linkbutton', 'align'=>'left', 'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>'', 'field_key'=>'field_name_0', 'field_key_1'=>'field_name_1', 'field_data'=>'field_name_2', 'href'=>'{0}'),
//     'FieldName_10'=>array('header'=>'Name_G', 'type'=>'money',     'align'=>'right','width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>'', 'sign'=>'$', 'sign_place'=>'before|after', 'decimal_places'=>'2', 'dec_separator'=>'.', 'thousands_separator'=>','),
//     'FieldName_11'=>array('header'=>'Name_K', 'type'=>'password',  'align'=>'left', 'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>'', 'hide'=>'false'),
//     'FieldName_12'=>array('header'=>'Name_L', 'type'=>'percent',   'align'=>'right','width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>'', 'decimal_places'=>'2', 'dec_separator'=>'.'),
//     'FieldName_13'=>array('header'=>'Name_M', 'type'=>'barchart',  'align'=>'left', 'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>'', 'field'=>'', 'value_sign'=>'', 'minimum_color'=>'', 'minimum_value'=>'', 'middle_color'=>'', 'middle_value'=>'', 'maximum_color'=>'', 'maximum_value'=>'100', 'display_type'=>'vertical|horizontal'),
//     'FieldName_14'=>array('header'=>'Name_N', 'type'=>'enum',      'align'=>'left', 'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'summarize'=>'false', 'summarize_sign'=>'', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>'', 'source'=>$fill_from_array, 'multiple'=>'false'),
//     'FieldName_15'=>array('header'=>'Name_O', 'type'=>'color',     'align'=>'center', 'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'text_length'=>'-1', 'tooltip'=>'false', 'tooltip_type'=>'floating|simple', 'case'=>'normal|upper|lower|camel', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>'', 'view_type'=>'text|image'),
//     'FieldName_16'=>array('header'=>'Name_P', 'type'=>'checkbox',  'align'=>'center', 'width'=>'X%|Xpx', 'wrap'=>'wrap|nowrap', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>'', 'true_value'=>1, 'false_value'=>0),
//     'FieldName_17'=>array('header'=>'Name_Q', 'type'=>'object',    'align'=>'center', 'width'=>'X%|Xpx', 'height'=>'X%|Xpx', 'sort_type'=>'string|numeric', 'sort_by'=>'', 'visible'=>'true', 'on_js_event'=>''),
//     'FieldName_18'=>array('header'=>'Name_R', 'type'=>'blob'),
//);
//$dgrid->SetColumnsInViewMode($vm_columns);
##  *** set auto-generated columns in view mode
$auto_column_in_view_mode = true;
$dgrid->SetAutoColumnsInViewMode($auto_column_in_view_mode);

$dgrid->SetDgMessages(array(
    'add_success'=>'', 'add_error'=>'',
    'update_success'=>'การดำเนินการแก้ไขเสร็จเรียบร้อยแล้ว', 'update_error'=>'',
    'delete_success'=>'', 'delete_error'=>''
));
## +---------------------------------------------------------------------------+
## | 7. Add/Edit/Details Mode settings:                                        |
## +---------------------------------------------------------------------------+
##  ***  set settings for edit/details mode
$table_name = "product";
$primary_key = "id";
$condition = "";
$dgrid->SetTableEdit($table_name, $primary_key, $condition);
$dgrid->SetAutoColumnsInEditMode(true);
## +---------------------------------------------------------------------------+
## | 8. Bind the DataGrid:                                                     |
## +---------------------------------------------------------------------------+
##  *** set debug mode & messaging options
$dgrid->Bind();
ob_end_flush();

$this->load->view('footer');
