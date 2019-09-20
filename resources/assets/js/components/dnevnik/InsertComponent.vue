<template>
    <div class="container">
       <h3>{{day}} {{checkLogin}}</h3>
       <label>Сообщение</label>
       <fieldset class="form-group">
         <textarea class="form-control" v-model="send.msg" placeholder="Сообщение"></textarea>
         <button @click="sendDay">Сохранить</button>
       </fieldset>
    </div>
</template>

<script>
    export default {
    data() {
     return {
             day:"123",
             send:{},
            }
    },
    props:['checkLogin'],
    created: function() {
      var day = this.$route.params.day;

      this.day = day;
    },
    methods:{
      sendDay:function(){
          axios
      .post('/api/dnevnik/day/' + this.day ,{msg:this.send.msg})
      .then(response => (alert(response.data)))
      .catch(response=>(alert('Ошибка')));
       },

      }

       

   



    }
</script>
