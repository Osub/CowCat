<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSingleLineFillBlanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_line_fill_blanks', function (Blueprint $table) {
            $table->increments('id');

            /*==表单唯一编号==*/
            $table->string( 'fid' );
            /*==当前表单组件的唯一编号==*/
            $table->string( 'gid' );
            /*==组件标题==*/
            $table->string( 'title' );
            /*==组件描述==*/
            $table->text( 'subtitle' );
            /*==组件输入框提示信息==*/
            $table->string( 'placeholder' );
            /*==数据后台项展示名称==*/
            $table->string( 'field_name' );
            /*==组件写入的数据类型==*/
            $table->enum( 'data_type', ['varchar','int','text'] );
            /*==组件校验类型(0:不校验,1:email,2:手机号,3:身份证号)==*/
            $table->enum( 'check_type', [0,1,2,3] );
            /*==组件最少字符==*/
            $table->smallInteger( 'minchar' );
            /*==组件最多字符==*/
            $table->smallInteger( 'maxchar' );
            /*==组件是否必填==*/
            $table->tinyInteger( 'is_must_fill' )->default(0);
            /*==组件填写内容在表单中是否唯一==*/
            $table->tinyInteger( 'is_unique' )->default(0);

            $table->softDeletes();
            $table->timestamps();
            
            $table->index('fid');
            $table->index('gid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('single_line_fill_blanks');
    }
}
