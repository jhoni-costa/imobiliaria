<?php 
/********************************************************************************************
 * @author Jhoni Costa <jhonirsc@gmail.com>                                                 *
 * @git https://github.com/jhoni-costa                                                      *
 * @since 17/06/2022                                                                        *
 * @desc Interface que paremetriza quais os metodos uma classe de teste deve ter            *
 *                                                                                          *
 ********************************************************************************************/
interface AbstractTest{
    
    public function testSelect($id);
    public function testInsert();
    public function testUpdate($id);
    public function testDelete($id);

}