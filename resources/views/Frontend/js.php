<?php
include('addNewMember.php');



?>

<script type="text/javascript">
    var insert_member = '<?php echo $result_insertNewMember; ?>';

    if(insert_member){
            Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
        )
    };
    
</script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
