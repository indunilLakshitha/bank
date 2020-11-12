<footer class="footer">
    <div class="container-fluid">
      {{-- <nav class="float-left">
        <ul>
          {{-- <li>
            <a href="https://www.creative-tim.com/">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/presentation">
              About Us
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/blog">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav> --}}
      <div class="copyright float-right" style="display: none;">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, Autonomous Factory
      </div>
    </div>
  </footer>
</div>
</div>



<!--   Core JS Files   -->
<script src={{asset("mat_ui/js/core/jquery.min.js")}}></script>
<script src={{asset("mat_ui/js/core/popper.min.js")}}></script>
<script src={{asset("mat_ui/js/core/bootstrap-material-design.min.js")}}></script>
<script src={{asset("mat_ui/js/plugins/perfect-scrollbar.jquery.min.js")}}></script>
<!-- Plugin for the momentJs  -->
<script src={{asset("mat_ui/js/plugins/moment.min.js")}}></script>
<!--  Plugin for Sweet Alert -->
<script src={{asset("mat_ui/js/plugins/sweetalert2.js")}}></script>
<!-- Forms Validations Plugin -->
<script src={{asset("mat_ui/js/plugins/jquery.validate.min.js")}}></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src={{asset("mat_ui/js/plugins/jquery.bootstrap-wizard.js")}}></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src={{asset("mat_ui/js/plugins/bootstrap-selectpicker.js")}}></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src={{asset("mat_ui/js/plugins/bootstrap-datetimepicker.min.js")}}></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src={{asset("mat_ui/js/plugins/jquery.dataTables.min.js")}}></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src={{asset("mat_ui/js/plugins/bootstrap-tagsinput.js")}}></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src={{asset("mat_ui/js/plugins/jasny-bootstrap.min.js")}}></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src={{asset("mat_ui/js/plugins/fullcalendar.min.js")}}></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src={{asset("mat_ui/js/plugins/jquery-jvectormap.js")}}></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src={{asset("mat_ui/js/plugins/nouislider.min.js")}}></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="{{asset('mat_ui/js/plugins/arrive.min.js')}}"></script>
<!--  Google Maps Plugin    -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
<!-- Chartist JS -->
<script src={{asset("mat_ui/js/plugins/chartist.min.js")}}></script>
<!--  Notifications Plugin    -->
<script src={{asset("mat_ui/js/plugins/bootstrap-notify.js")}}></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src={{asset("mat_ui/js/material-dashboard.js?v=2.1.2")}} type="text/javascript"></script>
<script src={{asset("mat_ui/demo/demo.js")}}></script>

<script>
$(document).ready(function() {
  $().ready(function() {
    $sidebar = $('.sidebar');

    $sidebar_img_container = $sidebar.find('.sidebar-background');

    $full_page = $('.full-page');

    $sidebar_responsive = $('body > .navbar-collapse');

    window_width = $(window).width();

    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

    if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
      if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
        $('.fixed-plugin .dropdown').addClass('open');
      }

    }

    $('.fixed-plugin a').click(function(event) {
      // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
      if ($(this).hasClass('switch-trigger')) {
        if (event.stopPropagation) {
          event.stopPropagation();
        } else if (window.event) {
          window.event.cancelBubble = true;
        }
      }
    });

    $('.fixed-plugin .active-color span').click(function() {
      $full_page_background = $('.full-page-background');

      $(this).siblings().removeClass('active');
      $(this).addClass('active');

      var new_color = $(this).data('color');

      if ($sidebar.length != 0) {
        $sidebar.attr('data-color', new_color);
      }

      if ($full_page.length != 0) {
        $full_page.attr('filter-color', new_color);
      }

      if ($sidebar_responsive.length != 0) {
        $sidebar_responsive.attr('data-color', new_color);
      }
    });

    $('.fixed-plugin .background-color .badge').click(function() {
      $(this).siblings().removeClass('active');
      $(this).addClass('active');

      var new_color = $(this).data('background-color');

      if ($sidebar.length != 0) {
        $sidebar.attr('data-background-color', new_color);
      }
    });

    $('.fixed-plugin .img-holder').click(function() {
      $full_page_background = $('.full-page-background');

      $(this).parent('li').siblings().removeClass('active');
      $(this).parent('li').addClass('active');


      var new_image = $(this).find("img").attr('src');

      if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
        $sidebar_img_container.fadeOut('fast', function() {
          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
          $sidebar_img_container.fadeIn('fast');
        });
      }

      if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

        $full_page_background.fadeOut('fast', function() {
          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          $full_page_background.fadeIn('fast');
        });
      }

      if ($('.switch-sidebar-image input:checked').length == 0) {
        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
      }

      if ($sidebar_responsive.length != 0) {
        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
      }
    });

    $('.switch-sidebar-image input').change(function() {
      $full_page_background = $('.full-page-background');

      $input = $(this);

      if ($input.is(':checked')) {
        if ($sidebar_img_container.length != 0) {
          $sidebar_img_container.fadeIn('fast');
          $sidebar.attr('data-image', '#');
        }

        if ($full_page_background.length != 0) {
          $full_page_background.fadeIn('fast');
          $full_page.attr('data-image', '#');
        }

        background_image = true;
      } else {
        if ($sidebar_img_container.length != 0) {
          $sidebar.removeAttr('data-image');
          $sidebar_img_container.fadeOut('fast');
        }

        if ($full_page_background.length != 0) {
          $full_page.removeAttr('data-image', '#');
          $full_page_background.fadeOut('fast');
        }

        background_image = false;
      }
    });

    $('.switch-sidebar-mini input').change(function() {
      $body = $('body');

      $input = $(this);

      if (md.misc.sidebar_mini_active == true) {
        $('body').removeClass('sidebar-mini');
        md.misc.sidebar_mini_active = false;

        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

      } else {

        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

        setTimeout(function() {
          $('body').addClass('sidebar-mini');

          md.misc.sidebar_mini_active = true;
        }, 300);
      }

      // we simulate the window Resize so the charts will get updated in realtime.
      var simulateWindowResize = setInterval(function() {
        window.dispatchEvent(new Event('resize'));
      }, 180);

      // we stop the simulation of Window Resize after the animations are completed
      setTimeout(function() {
        clearInterval(simulateWindowResize);
      }, 1000);

    });
  });
});
</script>
<script>
$(document).ready(function() {
  // Javascript method's body can be found in assets/js/demos.js
  md.initDashboardPageCharts();

  md.initVectorMap();

});
</script>

{{-- datatables --}}
<script>
    $(document).ready(function() {
      $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });

      var table = $('#datatable').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>

{{-- auto cap --}}
<script>

 function toCap(text, eleId){

    let textArr = text.toLowerCase().split(' ')
    let capsArr = []

    textArr.forEach(word => {
        capsArr.push(word[0].toUpperCase() + word.slice(1))
    })

    return document.querySelector(`#${eleId}`).value = capsArr.join(' ')

  }
</script>


{{-- open savings js --}}
<script>

    function get_other_holder(identification_type_id, identification_number, other_holder_name){
        // console.log(other_holder_name);
        if(other_holder_name === ''){
            search_by_name_results.classList.add('d-none')
            $.ajax({
            type: 'GET',
            url: '{{('/get_cus_details')}}',
            data: {identification_type_id, identification_number},
            success: function(data){
                console.log(data)
                return selected_oh.value = data.customer_id
            },
            error: function(data){
                console.log(data)
            }

            })
        } else{
            return get_other_holder_by_name(other_holder_name)
        }
    }

    function get_other_holder_by_name(other_holder_name){
        // console.log(other_holder_name);
        $.ajax({
            type: 'GET',
            url: '{{('/search_by_name')}}',
            data: {other_holder_name},
            success: function(data){
                console.log(data)
                return set_search_by_name_results(data)
            },
            error: function(data){
                console.log(data)
            }

        })
    }

    function set_search_by_name_results(data){
        search_by_name_results.classList.remove('d-none')
        search_by_name_results.innerHTML = ''
        data.forEach(i => {
            html = `
            <tr>
                <th>${i.full_name}</th>
                <th>${i.customer_id}</th>
                <th><a class="btn btn-primary text-white"
                    onclick="selected_oh.value = '${i.customer_id}'"
                    >Select</a></th>
            </tr>
            `
            search_by_name_results.innerHTML += html
        })
    }

    function get_cus_details(identification_type_id, identification_number, full_name){
        if(full_name === ''){
            $.ajax({
            type: 'GET',
            url: '{{('/get_cus_details')}}',
            data: {identification_type_id, identification_number},
            success: function(data){
                console.log(data)
                return set_cus_details(data)
            },
            error: function(data){
                console.log(data)
            }

            })
        } else {
            return get_cus_details_by_name(full_name)
        }
    }

    function get_cus_details_by_name(full_name){
        $.ajax({
            type: 'GET',
            url: '{{('/get_cus_details_by_name')}}',
            data: {full_name},
            success: function(data){
                console.log(data)
                return set_cus_details(data)
            },
            error: function(data){
                console.log(data)
            }

        })
    }

    function set_cus_details(data){
        full_name.value = data.full_name
        branch_code.value = data.branch_code
        branch_id.value = data.branch_id
        customer_id.value = data.customer_id
        dob.value = data.date_of_birth
        // join_acc_main_holder.value = data.customer_id
    }

    function get_guardian(identification_type_id, identification_number){
        $.ajax({
            type: 'GET',
            url: '{{('/get_guardian')}}',
            data: {identification_type_id, identification_number},
            success: function(data){
                console.log(data)
                return set_guardian(data)
            },
            error: function(data){
                console.log(data)
            }

        })
    }

    function set_guardian(data){
        g_first_name.value = data.name_in_use
        g_last_name.value = data.surname
        g_id_no.value = data.identification_number
        g_a_l_1.value = data.address_line_1
        g_a_l_2.value = data.address_line_2
    }
</script>
</body>

</html>
