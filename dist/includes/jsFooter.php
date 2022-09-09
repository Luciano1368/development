
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="<?php echo $uri ?>/assets/build/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo $uri ?>/assets/build/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="<?php echo $uri ?>/assets/build/js/custom.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="<?php echo $uri ?>/dist/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $uri ?>/dist/js/datatables.min.js"></script>
    <script src="<?php echo $uri ?>/dist/js/dataTables.searchPanes.min.js"></script>
    <script src="<?php echo $uri ?>/dist/js/dataTables.select.min.js"></script>


    <script>
        //ESTA PORCION DE JQUERY SELECT2 sirve para que el selector dropdown contenga buscador entre las opciones.

        jQuery(document).ready(function($){
            $(document).ready(function() {
                $('.mi-selector').select2();
            });
        });

        var $eventLog = $(".js-event-log");
        var $eventSelect = $('.mi-selector');

        $eventSelect.select2();

        $eventSelect.on("select2:open", function (e) { log("select2:open", e); });
        $eventSelect.on("select2:close", function (e) { log("select2:close", e); });
        $eventSelect.on("select2:select", function (e) { log("select2:select", e); });
        $eventSelect.on("select2:unselect", function (e) { log("select2:unselect", e); });

        function log (name, evt) {
           
            if (!evt) {
                var args = "{}";
            } else {
                var args = JSON.stringify(evt.params, function (key, value) {
                    
                    if (value && value.nodeName) return "[DOM node]";
                    if (value instanceof $.Event) return "[$.Event]";
                    return value;
                });
            }
            var $e = $("<li>" + name + " -> " + args + "</li>");
            $eventLog.append($e);
            $e.animate({ opacity: 1 }, 10000, 'linear', function () {
                $e.animate({ opacity: 0 }, 2000, 'linear', function () {
                    $e.remove();
                });
            });
        }
    </script>       