<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div>                                       
                    <div class="panel-body">
                        {{ info.days }}
                    </div>
                    <div class="calendar">
                      <div class="calendar__day" v-for="n in 42" v-bind:class={calendar__day_disactive:checkDisactiveDays(n)}>                        
                        <router-link to="/dnevnik/123"> {{ info.days[n-1] }}</router-link>
                      </div>
                      
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
  .calendar{
    width: 700px;
    height: 600px;
    display:grid;
    grid-template-columns: repeat(7,1fr);
    grid-template-rows: repeat(6,1fr);
    grid-column-gap: 0px;
    grid-row-gap:0px;
  }
  .calendar__day{
    border:1px solid;
    margin: -0.5px;
  } 
  .calendar__day:hover{
    border:2px solid green;
  }

  .calendar__day_disactive{
    background-color: grey;
  } 
  
</style>

<script>
    export default {
    data() {
    return {
      info: null,
      id: 1
    };
    },
    
        mounted() {
            console.log('Component mounted.');
            axios
      .get('/api/dnevnik/' + this.id)
      .then(response => (this.info = response.data));
        },

   methods: {
    changeId: function () {
           axios
      .get('/api/dnevnik/' + this.id)
      .then(response => (this.info = response.data))
      .catch(response =>(this.info.msg = 'страница не найдена',this.info.name= 'страница не найдена')); 
    },
    checkDisactiveDays:function(n){
      if(this.info.days[n-1]<20 && n>28 || this.info.days[n-1]>n ) return true;
      return false
  },
  computed: {
    day:function() {
      Date = new Date();
      return Date.getMonth();
      }
       
    }  
  },  



    }
</script>
