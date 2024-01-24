! function(e) {
    e(document).ready(function() {
        var s, a = function(a, t, l) {
                var o = e(".notification-popup ");
                o.find(".task").text(a), o.find(".notification-text").text(t), o.removeClass("hide success"), l && o.addClass(l), s && clearTimeout(s), s = setTimeout(function() {
                    o.addClass("hide")
                }, 3e3)
            },
            t = function() {
                
                 var s = e("#new-task").val();
                if ("" == s) e("#new-task").addClass("error"), e(".new-task-wrapper .error-message").removeClass("hidden");
                else {
                        $.ajax({
                            url: url+"admin/todo_do/add_task",
                            method: "post",
                            data:{
                                task: s
                            },    
                            success:function(data){
                                    console.log(data);
                               
                                    var t = e(".todo-list-body").prop("scrollHeight"),
                                        l = e(o).clone();
                                    l.find(".task-label").text(s), l.addClass("new"), l.removeClass("completed"), e("#todo-list").append(l), e("#new-task").val(""), e("#mark-all-finished").removeClass("move-up"), e("#mark-all-incomplete").addClass("move-down"), a(s, "added to list"), e(".todo-list-body").animate({
                                        scrollTop: t
                                    }, 1e3)
                            }
                        })
                }
                
                
              
            },
            l = function() {
                e(".add-task-btn").toggleClass("hide"), e(".new-task-wrapper").toggleClass("visible"), e("#new-task").hasClass("error") && (e("#new-task").removeClass("error"), e(".new-task-wrapper .error-message").addClass("hidden"))
            },
            o = e(e("#task-template").html());
        e(".add-task-btn").click(function() {
            var s = e(".new-task-wrapper").offset().top;
            e(this).toggleClass("hide"), e(".new-task-wrapper").toggleClass("visible"), e("#new-task").focus(), e("body").animate({
                scrollTop: s
            }, 1e3)
        }), e("#todo-list").on("click", ".task-action-btn .delete-btn", function() {
             var s = e(this).closest(".task"),
              id = s.find(".task-label").data('task_id');
                   t = s.find(".task-label").text();
               
             $.ajax({
                            url: url+"admin/todo_do/delete_task",
                            method: "post",
                            data:{
                                task_id: id
                            },    
                            success:function(data){
                                            
                                      s.remove(), a(t, " ha sido eliminada.")         
                                       
                            }
                        })
            
  
            
            
            
        }), e("#todo-list").on("click", ".task-action-btn .complete-btn", function() {
            
              var s = e(this).closest(".task"),
                t = s.find(".task-label").text(),
                id = s.find(".task-label").data('task_id');
                 l = s.hasClass("completed") ? "Mark Complete" : "Mark Incomplete";
                  e(this).attr("title", l), s.hasClass("completed") ? a(t, " marcado como pendiente.") : a(t, " marcado como completado.", "success"), s.toggleClass("completed")
            
             $.ajax({
                            url: url+"admin/todo_do/complete_task",
                            method: "post",
                            data:{
                                task_id: id
                            },    
                            success:function(data){
                                     console.log(data);
                            }
                        })
          
            
        }), e("#new-task").keydown(function(s) {
            var a = s.keyCode,
                o = 13,
                n = 27;
            e("#new-task").hasClass("error") && (e("#new-task").removeClass("error"), e(".new-task-wrapper .error-message").addClass("hidden")), a == o ? (s.preventDefault(), t()) : a == n && l()
        }), e("#close-task-panel").click(l), e("#mark-all-finished").click(function() {
            
            $.ajax({
                    url: url+"admin/todo_do/mark_all_task",
                    method: "post",
                    data:{},    
                    success:function(data){
                        
                             $("#todo-list .task").addClass("completed");
                             $("#mark-all-incomplete").removeClass("move-down");
                             $('#mark-all-finished').addClass("move-up");
                             a("Todas las tareas", " se marcaron como completadas.", "success");  
                               
                    }
                })
            
          
            
        }), e("#mark-all-incomplete").click(function() {
            
             $.ajax({
                    url: url+"admin/todo_do/desmark_all_task",
                    method: "post",
                    data:{},    
                    success:function(data){
                        
                             $("#todo-list .task").removeClass("completed");
                             $('#mark-all-incomplete').addClass("move-down");
                             $("#mark-all-finished").removeClass("move-up");
                             a("Todas las tareas", " se marcaron como pendientes.");
                               
                    }
                })
            
           
        }),
        e("#add-task").click(t)
    })
}(jQuery);