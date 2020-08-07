<?php
class Usuarios_model extends CI_model{

	
	
	public function dadoitens()
		{
			$this->db->from('item i');
			$this->db->join('foto f', 'f.foto_item=i.item_id');
			$query = $this->db->get();
			return $query->result();

		}
		public function procuraid($id)
	{
		$this->db->from('Cadastro c');
		$this->db->where('c.id',$id);
		$this->db->join('Lojas l', 'c.Loja=l.codigo');
		$this->db->order_by('c.Nome','asc'); 
		$result = $this->db->get();
		return $result->row(0);
		
		
	}
	
}
