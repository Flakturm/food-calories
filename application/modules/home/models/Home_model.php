<?php
/**
 * 
 */
class Home_model extends CI_Model
{
    private $table = 'entry';
    
    function create( $data )
    {
        $data['date'] = date( 'Y-m-d H:i:s', strtotime( $data['date'] ) );
        return ( $this->db->insert( $this->table, $data ) )? array( true, $this->db->insert_id() ) : array( false );
    }
    
    function read( $id = '' )
    {
        if ( $id )
		{
			$this->db->where( "id", $id );
		}

		$query = $this->db->get( $this->table );

		if ( $id )
		{	// fetch single record
			return ($query->num_rows() > 0)? $query->row_array() : false;
		}
		else
		{
			return $query->result();
		}
    }
    
    function update($data)
	{
        $id = $data['id'];
        $data['date'] = date( 'Y-m-d H:i:s', strtotime( $data['date'] ) );
        unset( $data['id'] );
		return ( $this->db->update($this->table, $data, "id = $id") )? true : false;
	}
    
    function delete($id){
		$this->db->where('id', $id);
		return ( $this->db->delete($this->table) )? true : false;
	}
}
