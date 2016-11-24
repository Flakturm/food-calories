<?php
/**
 * 
 */
class Filter_model extends CI_Model
{
    private $table = 'entry';
    
    function read( $data )
    {
		$data['from_date'] = date( 'Y-m-d H:i:s', strtotime( $data['from_date'] ) );
		$data['to_date'] = date( 'Y-m-d H:i:s', strtotime( $data['to_date'] ) );
        $this->db->select("DATE_FORMAT(date,'%d-%m-%Y') AS date, SUM(calories) AS total");
		$this->db->group_by("DATE_FORMAT(date,'%d-%m-%Y')");
		$this->db->where('date >=', $data['from_date']);
		$this->db->where('date <=', $data['to_date']);

		$query = $this->db->get( $this->table );
		return $query->result();
    }
}
