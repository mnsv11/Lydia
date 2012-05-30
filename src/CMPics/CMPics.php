<?php
/**
 * A model for pictures stored in database.
 * 
* @package LydiaCore
 */
class CMPics extends CObject implements IHasSQL, ArrayAccess, IModule {

  /**
   * Properties
   */
  public $data;


  /**
   * Constructor
   */
  public function __construct($id=null) {
    parent::__construct();
    if($id) {
      $this->LoadById($id);

    } else {
      $this->data = array();
    }
  }


  /**
   * Implementing ArrayAccess for $this->data
   */
  public function offsetSet($offset, $value) { if (is_null($offset)) { $this->data[] = $value; } else { $this->data[$offset] = $value; }}
  public function offsetExists($offset) { return isset($this->data[$offset]); }
  public function offsetUnset($offset) { unset($this->data[$offset]); }
  public function offsetGet($offset) { return isset($this->data[$offset]) ? $this->data[$offset] : null; }


  /**
   * Implementing interface IHasSQL. Encapsulate all SQL used by this class.
   *
   * @param string $key the string that is the key of the wanted SQL-entry in the array.
   */
  
    public static function SQL($key=null, $args=null) {
    $order_order  = isset($args['order-order']) ? $args['order-order'] : 'ASC';
    $order_by     = isset($args['order-by'])    ? $args['order-by'] : 'id';    
    $queries = array(
      'drop table pictures'      => "DROP TABLE IF EXISTS Pictures;",
      'create table pictures'    => "CREATE TABLE IF NOT EXISTS Pictures (id INTEGER PRIMARY KEY, name TEXT,sub TEXT,comments TEXT, data TEXT, idUser INT, created DATETIME default (datetime('now')));",
      'insert pictures'          => 'INSERT INTO Pictures (name,sub,comments,data,idUser) VALUES (?,?,?,?,?);',
      'select * by id'           => 'SELECT c.*, u.acronym as owner FROM Pictures AS c INNER JOIN User as u ON c.idUser=u.id WHERE c.id=?;',
      'select * by name'         => "SELECT c.*, u.acronym as owner FROM Pictures AS c INNER JOIN User as u ON c.idUser=u.id WHERE type=? ORDER BY {$order_by} {$order_order};",
      'select *'                 => 'SELECT * FROM Pictures;'
     );
    if(!isset($queries[$key])) {
      throw new Exception("No such SQL query, key '$key' was not found.");
    }
    return $queries[$key];
  }



  /**
   * Implementing interface IModule. Manage install/update/deinstall and equal actions.
   */
  public function Manage($action=null) {
    switch($action) {
      case 'install': 
        try {
          $this->db->ExecuteQuery(self::SQL('drop table pictures'));
          $this->db->ExecuteQuery(self::SQL('create table pictures'));
          $this->db->ExecuteQuery(self::SQL('insert pictures'), array('gsxr1000sv.png','GSXR1000','Hoj som jag vill ha', '<table>
   <thead>
      <tr>
         <th>Chassis</th>
 
      </tr>
   </thead>
   <tbody>
      <tr>
         <td id=tdmain>Color</td>
         <td>Metallic Mat Black No.2/Glass Sparkle Black, Metallic Triton Blue/Glass Splash White</td>
      </tr>
      <tr>
         <td>Brakes Front</td>
         <td>Disc brake, twin </td>
      </tr>
      <tr>
         <td>Brakes Rear</td>
         <td>Disc brake</td>
      </tr>
      <tr>
         <td>Curb Weight</td>
         <td>448 lbs </td>
      </tr>
      <tr>
         <td>Final Drive</td>
         <td>Chain, DID50VAZ, 114 links</td>
      </tr>
      <tr>
         <td>Fuel Tank Capacity</td>
         <td>4.6 gallons</td>
      </tr>
      <tr>
         <td>Ground Clearance</td>
         <td>130mm (5.1 in.) </td>
      </tr>
      <tr>
         <td>Ground Clearance</td>
         <td>5.1 </td>
      </tr>
      <tr>
         <td>Overall Length</td>
         <td>2045 mm (80.5 in.)</td>
      </tr>
      <tr>
         <td>Overall Width</td>
         <td>705 mm (27.8 in.)</td>
      </tr>
      <tr>
         <td>Overall Width</td>
         <td>27.8</td>
      </tr>
      <tr>
         <td>Seat Height</td>
         <td>810 mm (31.9 in.)</td>
      </tr>
      <tr>
         <td>Suspension Front</td>
         <td>Inverted telescopic, coil spring, oil damped</td>
      </tr>
      <tr>
         <td>Suspension Rear</td>
         <td>Link type, coil spring, oil damped</td>
      </tr>
      <tr>
         <td>Tires Front</td>
         <td>120/70ZR17 M/C (58W), tubeless</td>
      </tr>
      </tr>
      <tr>
         <td>Tires Rear</td>
         <td>190/50ZR17M/C (73W), tubeless</td>
      </tr>
      </tr>
      <tr>
         <td>Transmission</td>
         <td>6-speed constant mesh</td>
      </tr>
      </tr>
      <tr>
         <td>Wheelbase</td>
         <td>1405mm (55.3 in.)</td>
      </tr>
      <thead>
      <tr>
         <td>Engine</td>
      </tr>
     </thead>
     <tr>
         <td>Engine</td>
         <td>999cc, 4-stroke, liquid-cooled, 4-cylinder, DOHC</td>
      </tr>
      <tr>
         <td>Effect kw(hp)/rpm</td>
         <td>136.1(185)/12000</td>
      </tr>
      <tr>
         <td>Bore Stroke</td>
         <td>74.5 mm x 57.3 mm</td>
      </tr>
      <tr>
         <td>Compression Ratio</td>
         <td>12.9 : 1</td>
      </tr>
      <tr>
         <td>Fuel System</td>
         <td>Suzuki Fuel Injection</td>
      </tr>
      <tr>
         <td>Ignition</td>
         <td>Electronic ignition (Transistorized)</td>
      </tr>
      <tr>
         <td>Lubrication</td>
         <td>Wet sump</td>
      </tr>
      <tr>
         <td>Starter</td>
         <td>Electric</td>
      </tr>
      
   </tbody>
</table>', $this->user['id']));
          $this->db->ExecuteQuery(self::SQL('insert pictures'), array('GSXR1100_93.png','GSXR1100','Hoj som jag haft', '<table>
   <tbody>
      <tr>
         <td id=tdmain>Overall Length</td>
         <td>2 130 mm (83.9 in)</td>
      </tr>
      <tr>
         <td>Overall Width</td>
         <td>755 mm (29.7 in)</td>
      </tr>
      <tr>
         <td>Overall Height</td>
         <td>1 190 mm (46.9 in)</td>
      </tr>
      <tr>
         <td>Seat Height</td>
         <td>815 mm (32.1 in)</td>
      </tr>
      <tr>
         <td>Wheelbase</td>
         <td>1 485 mm (58.5 in)</td>
      </tr>
      <tr>
         <td>Ground Clearance</td>
         <td>130 mm (5.1 in)</td>
      </tr>
      <tr>
         <td>Dry weight</td>
         <td>231 kg (509,3 lbs)</td>
      </tr>
      <tr>
         <td>Engine type</td>
         <td>Water-cooled 1074 cc inline-four, DOHC, 16 valves. 155 hp (113 kW)/ 10,000 rpm, 115 Nm (11,7 kg-m)/ 9,000 rpm.</td>
      </tr>


   </tbody>
</table>', $this->user['id']));
          $this->db->ExecuteQuery(self::SQL('insert pictures'), array('GSX750ES_blue_84.png','GSX750ES','Hoj som jag har', '<table>
   <tbody>
      <tr>
         <td id=tdmain>Overall Length</td>
         <td>2 155 mm (84.8 in)</td>
      </tr>
      <tr>
         <td>Overall Width</td>
         <td>765 mm (30.1 in)</td>
      </tr>
      <tr>
         <td>Overall Height</td>
         <td>1 260 mm (49.6 in)</td>
      </tr>
      <tr>
         <td>Seat Height</td>
         <td>780 mm (30.7 in)</td>
      </tr>
      <tr>
         <td>Wheelbase</td>
         <td>1 480 mm (58.3 in)</td>
      </tr>
      <tr>
         <td>Ground Clearance</td>
         <td>155 mm (6.1 in)</td>
      </tr>
      <tr>
         <td>Dry weight</td>
         <td>210 kg (462 lbs)</td>
      </tr>
      <tr>
         <td>Engine type</td>
         <td>Air/oil cooled 747cc inline-4, DOHC, 16 valves. 84 hp (61,5 kW)/ 9.500 rpm, 66,6 Nm (6,6 kpm)/ 8.500 rpm.</td>
      </tr>


   </tbody>
</table>', $this->user['id']));
          return array('success', 'Successfully created the database tables and created default pictures, owned by you.');
        } catch(Exception$e) {
          die("$e<br/>Failed to open database: " . $this->config['database'][0]['dsn']);
        }
      break;
      
      default:
        throw new Exception('Unsupported action for this module.');
      break;
    }
  }
  
 
  
    /**
   * Save Pics.
   *
   * @returns boolean true if success else false.
   */
  public function Save() {
    $msg = null;
      $this->db->ExecuteQuery(self::SQL('insert pictures'), array($this['name'],$this['sub'],$this['comments'], $this['data'], $this->user['id']));
      $this['id'] = $this->db->LastInsertId();
      $msg = 'created';
    $rowcount = $this->db->RowCount();
    if($rowcount) {
      $this->AddMessage('success', "Successfully {$msg} pictures");
    } else {
      $this->AddMessage('error', "Failed to {$msg} pictures");
    }
    return $rowcount === 1;
  }
  
  
  
    /**
   * Load pics by id.
   *
   * @param id integer the id of the pics.
   * @returns boolean true if success else false.
   */
  public function LoadById($id) {
    $res = $this->db->ExecuteSelectQueryAndFetchAll(self::SQL('select * by id'), array($id));
    if(empty($res)) {
      $this->AddMessage('error', "Failed to load pictures with id '$id'.");
      return false;
    } else {
      $this->data = $res[0];
    }
    return true;
  }
  
  
  /**
   * List all Pictures.
   *
   * @param $args array with various settings for the request. Default is null.
   * @returns array with listing or null if empty.
   */

  public function ListAll() {    

   
        return $this->db->ExecuteSelectQueryAndFetchAll(self::SQL('select *'));

  }
  
  
}

