<?php
/**
 * undocumented class
 *
 * @package default
 * @author Michael Ventimiglia Jr.
 **/
class Exporter
{
    private $contents           = array();
    private $file;
    private $db;
    private $result;
    private $fields;
    private $limit              =   1000;
    private $filter;
    private $path               =   '/home/aaron/public_html/vulcanmotors/members/Exporter/exports/';
    private $filename;
    private $availableFields    =   array(
            'firstname',
            'lastname',
            'address',
            'city',
            'state',
            'zip',
            'workphone',
            'homephone',
            'mobilephone',
            'email');

    public function __construct()
    {
        $this->db   =   new mysqli(
                "127.0.0.1",
                "vulcanmoto",
                "vulcanclub",
                "vulcanmotomsdb");
    }

    private function fetchRecords()
    {
        if ($result = $this->db->query($this->buildQuery())) {
            while($row = $result->fetch_assoc()) {
                $line = implode(",",$row) . "\n";
                array_push($this->contents, $line);
            }
            return true;
        }
    }

    private function buildQuery()
    {
        $fields = implode(',',$this->fields);
        $limit  = "LIMIT 0," . $this->limit;
        $query = "SELECT " . $fields . " FROM drivers";
        return $query;
    }

    private function saveCSV()
    {
        if (is_array($this->contents)) {
            foreach($this->contents as $line) {
                fputcsv($this->file, split(',',$line));
            }
            return true;
        }
    }

    public function downloadCSV()
    {
        header('Content-disposition: attachment; filename=' . $this->path . $this->filename);
        header('Content-type: text/plain');
        readfile($this->path . $this->filename);
    }

    public function save() {
        $this->file = $this->newFile();
        if ($save = $this->fetchRecords()) {
            $this->saveCSV();
            fclose($this->file);
            return true;
        }

    }

    private function newFile()
    {
        $file = fopen($this->path . $this->filename, 'x+');
        return $file;
    }

    public function setFilename($filename)
    {
        if (empty($filename)) {
            $this->filename = date('Y-m-d') . time();
        } else {
            $this->filename = $filename . date('Y-m-d') . '.csv';
        }
    }

    public function setFields($fields)
    {
        if (is_array($fields)) {
            $this->fields = $fields;
        } else {
            return false;
        }
    }

    public function setLimit($limit = false)
    {
        if ($limit) {
            $this->limit = $limit;
        }
    }

    public function setFilter($filters = false)
    {
        if ($filter) {
            $this->filter = $filters;
        }
    }

    public function getAvailableFields()
    {
        return $this->availableFields;
    }

} // END class Exporter
?>