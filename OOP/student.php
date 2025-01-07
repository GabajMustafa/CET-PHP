<?php
    
    class Student {
        private int $id;
        private $name;
        const TAX = 0.06;
        
        public function __construct(int $id, String $name)
        {
            $this->id= $id;
            $this->name = $name;          
        }

        public function __toString()
        {
            return $this->id . " " . $this->name;
        }

        public function __get($propertyRequested){
            
            return $this->$propertyRequested;
        }

      
        public function __set($propertyToModify, $value){
            
            $this->$propertyToModify = $value . ' ' . self::TAX;
             
        }  
    }


?>