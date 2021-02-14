<?php
if (!function_exists('clean')) {
    function clean($data)
    {
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
    }
}
if (!function_exists('get_item_detail')) {
    function get_item_detail($id)
    {
        clean($id);
        $item_details = array();
        include ('db.php');
        
        $menu_result = $mysqli->query("SELECT * FROM menu WHERE id='$id'");
        $menu_item = $menu_result->fetch_all(MYSQLI_ASSOC);
        $category_id = $menu_item[0]['category_id'];

        $category_result = $mysqli->query("SELECT * FROM category WHERE id='$category_id'");
        $category_name = $category_result->fetch_all(MYSQLI_ASSOC);
        $mysqli->close();

        $item_details['category_name'] = $category_name[0]['name'];
        $item_details['name'] = $menu_item[0]['name'];
        $item_details['detail'] = $menu_item[0]['detail'];
        $item_details['price'] = $menu_item[0]['price'];
        $item_details['img'] = $menu_item[0]['img'];
        return $item_details;
    }
}
if (!function_exists('get_orders')) {
    function get_orders()
    {
        $orders_result = array();
        include ('db.php');
        
        $orders = $mysqli->query("SELECT * FROM orders WHERE order_status<>'9'");
        $orders_result = $orders->fetch_all(MYSQLI_ASSOC);
        return $orders_result;
    }
}

if (!function_exists('get_order')) {
    function get_order($order_id)
    {
        include ('db.php');
        $order_id = $mysqli->escape_string($order_id);
        $order_result = $mysqli->query("SELECT * FROM orders WHERE id='$order_id'");
        if ($order_result->num_rows == 1) {
            $order = $order_result->fetch_all(MYSQLI_ASSOC);
            return $order;
        } else {
            $_SESSION['fail_message']='Problem with order none or more than one found!';
            return array(0 => 'Not existing order');
        }
    }
}


if (!function_exists('get_order_detail')) {
    function get_order_detail($order_id)
    {
        include ('db.php');
        $order_id = $mysqli->escape_string($order_id);
        $order_result_detail = $mysqli->query("SELECT * FROM order_detail WHERE order_id='$order_id'");
        if ($order_result_detail->num_rows >0) {
            $order_detail = $order_result_detail->fetch_all(MYSQLI_ASSOC);
            return $order_detail;
        } else {
            $_SESSION['fail_message']='Problem with order_details none were found!';
            return array(0 => 'Not existing order_details');
        }
    }
}


if (!function_exists('get_cat_name')) {
    function get_cat_name($cat_id)
    {
        require('db.php');
        $result_cats = $mysqli->query("SELECT * FROM category WHERE id='$cat_id'");
        $cats = $result_cats->fetch_all(MYSQLI_ASSOC);
        $cat_name = $cats[0]["name"];
        return $cat_name;
    }
}

if (!function_exists('getInsertId')) {
    function getInsertId(mysqli &$instance, $enforceQuery = false)
    {
        if (!$enforceQuery) {
            return $instance->insert_id;
        }
        $result = $instance->query('SELECT LAST_INSERT_ID();');
        if ($instance->errno) {
            return false;
        }
        list($buffer) = $result->fetch_row();
        $result->free();
        unset($result);
        return $buffer;
    }
}


?>
