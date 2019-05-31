<template>
    <div class="container">
        health: {{day}}
    </div>
</template>

<script>
    export default {
    data() {
     return {
             day:"123"
            }
    },
    created: function() {
      var day = this.$route.params.day;

      this.day = day;
    }

       

   



    }
</script>
