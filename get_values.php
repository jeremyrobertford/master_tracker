<?php

function get_vals($table, $cols, $sort_col='') {
    include_once('connect_sql.php');
    $sql = 'SELECT ';
    foreach ($cols as $col) {
        $sql = $sql . $col . ', ';
    }
    $sql = rtrim($sql, ', ');
    $sql = $sql . ' FROM master_tracker.' . $table;
    if ($sort_col != '') {
        $sql = $sql . ' ORDER BY ' . $sort_col;
    }

    $result = $conn->query($sql);

    $values = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
			$val_row = array();
            foreach ($cols as $col) {
                $val_row[$col] = $row[$col];
            }
			array_push($values, $val_row);
        }
        return $values;
    } else {
      return array();
    }
}

// EOF

