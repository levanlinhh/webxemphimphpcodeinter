<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['db_invalid_connection_str'] = 'Không thể xác định cài đặt cơ sở dữ liệu dựa trên chuỗi kết nối bạn đã gửi.';
$lang['db_unable_to_connect'] = 'Không thể kết nối với máy chủ cơ sở dữ liệu của bạn bằng cài đặt được cung cấp.';
$lang['db_unable_to_select'] = 'Không thể chọn cơ sở dữ liệu được chỉ định: %s';
$lang['db_unable_to_create'] = 'Không thể tạo cơ sở dữ liệu được chỉ định: %s';
$lang['db_invalid_query'] = 'Truy vấn bạn đã gửi không hợp lệ.';
$lang['db_must_set_table'] = 'Bạn phải đặt bảng cơ sở dữ liệu sẽ được sử dụng với truy vấn của mình.';
$lang['db_must_use_set'] = 'Bạn phải sử dụng phương pháp "set" để cập nhật một mục nhập.';
$lang['db_must_use_index'] = 'Bạn phải chỉ định một chỉ mục để khớp với các bản cập nhật hàng loạt.';
$lang['db_batch_missing_index'] = 'Một hoặc nhiều hàng được gửi để cập nhật hàng loạt bị thiếu chỉ mục được chỉ định.';
$lang['db_must_use_where'] = 'Cập nhật không được phép trừ khi chúng chứa mệnh đề "where".';
$lang['db_del_must_use_where'] = 'Không được phép xóa trừ khi chúng chứa mệnh đề "where" hoặc "like".';
$lang['db_field_param_missing'] = 'Để tìm nạp các trường yêu cầu tên của bảng làm tham số.';
$lang['db_unsupported_function'] = 'Tính năng này không khả dụng cho cơ sở dữ liệu bạn đang sử dụng.';
$lang['db_unable_to_drop'] = 'Không thể bỏ cơ sở dữ liệu được chỉ định.';
$lang['db_unsupported_feature'] = 'Tính năng không được hỗ trợ của nền tảng cơ sở dữ liệu bạn đang sử dụng.';
$lang['db_unsupported_compression'] = 'Định dạng nén tệp bạn chọn không được máy chủ của bạn hỗ trợ.';
$lang['db_filepath_error'] = 'Không thể ghi dữ liệu vào đường dẫn tệp bạn đã gửi.';
$lang['db_invalid_cache_path'] = 'Đường dẫn bộ nhớ cache bạn đã gửi không hợp lệ hoặc không thể ghi được.';
$lang['db_table_name_required'] = 'Tên bảng là bắt buộc cho thao tác đó.';
$lang['db_column_name_required'] = 'Tên cột là bắt buộc cho thao tác đó.';
$lang['db_column_definition_required'] = 'Cần có định nghĩa cột cho thao tác đó.';
$lang['db_unable_to_set_charset'] = 'Không thể đặt bộ ký tự kết nối máy khách: %s';
$lang['db_error_heading'] = 'Đã xảy ra lỗi cơ sở dữ liệu';

