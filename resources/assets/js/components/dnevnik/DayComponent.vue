<template>
    <div class="container">
        <router-link :to=getPathInsert>Изменить</router-link>
        {{info.msg}}
        
    </div>
</template>

<script>
   export default {
    data() {
     return {
             date:"",
             info:"",           
            }
    },
    created: function() {
      var date = this.$route.params.date;
      this.date=date;   
      this.getDayEvent(date);
    },
    
    methods: {
       getDayEvent: function(date){
          axios
      .get('/api/dnevnik/day/' + date)
      .then(response => (this.info = response.data))
      .catch(response=>(this.info=""));
       },
    },

    computed: {  
      getPathInsert:function() {    
        return this.date+"/insert";
      }
    }, 
       


  }
</script>
