    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/vendors/todo.css">
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Tareas</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Tareas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
     <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-body pt-0">
                    <div class="todo">
                      <div class="todo-list-wrapper">
                        <div class="todo-list-container">
                          <div class="mark-all-tasks">
                            <div class="mark-all-tasks-container"><?php   $todo_do = $this->db->get_where('todo_do',array('directory_id'=>$this->session->userdata('login_user_id'),'status'=>0))->result_array(); ?>
                                <span class="mark-all-btn " id="mark-all-finished" role="button"><span class="btn-label">Marcar todos.</span>
                                <span class="action-box completed"><i class="icon"><i class="icon-check"></i></i></span></span>
                                <span class="mark-all-btn  <?php if(count($todo_do) != 0){ echo ' move-down';}  ?> " id="mark-all-incomplete" role="button"><span class="btn-label">Marcar todos como pendientes.</span>
                                <span class="action-box"><i class="icon"><i class="icon-check"></i></i></span></span>
                            </div>
                          </div>
                          <div class="todo-list-body">
                            <ul id="todo-list">
                                <?php 
                                    $todo_do = $this->db->get_where('todo_do',array('directory_id'=>$this->session->userdata('login_user_id')))->result_array();
                                    foreach($todo_do as $todo):
                                ?>
                              <li class="task <?php echo $todo['status'] == 1 ? 'completed':''; ?>">
                                <div class="task-container ">
                                  <h4 class="task-label " data-task_id="<?php echo $todo['todo_do_id']?>"><?php echo $todo['task']?></h4><span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
                                </div>
                              </li>
                                <?php endforeach; ?>
                            </ul>
                          </div>
                          <div class="todo-list-footer">
                            <div class="add-task-btn-wrapper"><span class="add-task-btn">
                                <button class="btn btn-primary"><i class="icon-plus"></i>Agregar tarea</button></span></div>
                            <div class="new-task-wrapper">
                              <textarea id="new-task" placeholder="Agregar nueva tarea. . ."></textarea><span class="btn btn-danger cancel-btn" id="close-task-panel">Cancelar</span><span class="btn btn-success ms-3 add-new-task-btn" id="add-task">Agregar</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="notification-popup hide">
                        <p><span class="task"></span><span class="notification-text"></span></p>
                      </div>
                    </div>
                    <!-- HTML Template for tasks-->
                    <script id="task-template" type="tect/template">
                      <li class="task">
                      <div class="task-container">
                      <h4 class="task-label"></h4>
                      <span class="task-action-btn">
                      <span class="action-box large delete-btn" title="Eliminar tarea">
                      <i class="icon"><i class="icon-trash"></i></i>
                      </span>
                      <span class="action-box large complete-btn" title="Completar tarea">
                      <i class="icon"><i class="icon-check"></i></i>
                      </span>
                      </span>
                      </div>
                      </li>
                    </script>
                  </div>
                </div>
              </div>
              <!-- Container-fluid Ends-->
            </div>
          </div>
          <!-- Container-fluid ends                    -->
</div>
<script>
    url = '<?php echo base_url(); ?>';
</script>
 <script src="<?php echo base_url(); ?>public/assets/js/todo/todo.js"></script>