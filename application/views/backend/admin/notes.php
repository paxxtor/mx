<div class="customizer-contain notes-container ">
    <div>
        <div class="customizer-header "> <i class="icofont-close icon-close close-customizer-btn "></i>
            <h5>NOTAS</h5>
            <p class="mb-0">Realiza apuntes desde cualquier parte.</p>
        </div>
        <div class="customizer-body custom-scrollbar">
            <div class="row sticky-header-main">
                <div class="col-sm-12">
                    <div class="">
                        <a class="btn btn-primary pull-right m-l-10" id="add_new" href="javascript:;">Nueva nota</a>
                        <div class="card-body">
                            <div class="sticky-note" id="board">
                                <?php 
                                    $notes = $this->db->get_where('note',array('directory_id'=>$this->session->userdata('login_user_id')))->result_array(); 
                                    foreach ($notes as $note):
                                ?>
                                <div class="note" data-id="<?php echo $note['note_id'];?>">
                                    <a href="javascript:;" class="button remove">X</a>
                                    <div class="note_cnt">
                                        <textarea class="title notes" data-id="<?php echo $note['note_id'];?>" placeholder="Título"><?php echo $note['title'];?></textarea>
                                        <textarea class="cnt notes" data-id="<?php echo $note['note_id'];?>" placeholder="Apunta lo que necesites aquí."><?php echo $note['cnt'];?></textarea>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>