<?php

function construct() {
    load_model('index');
}


function indexAction() {
    // đẩy phòng lên giao diện trang chủ
    $data['productions'] = get_list_productions();
    // đẩy các phòng đạt tiêu chuẩn
    $data['production4'] =  lodall_sanpham();
    // đẩy các sản phẩm theo lượt thích
    $data['production']= lodall_sanpham_top10();
// chuyển sang trang chủ với dữ liệu trên
    load_view('index', $data);
}

