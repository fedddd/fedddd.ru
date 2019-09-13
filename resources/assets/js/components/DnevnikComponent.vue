<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div> 
                  <button @click="prevMonth">предыдущий месяц</button> 
                  <button @click="nextMonth">следующий месяц</button>                                                        
                    <div class="panel-body">
                        <h3>{{ info.monthText }} {{ info.year }}</h3>
                    </div>
                    <div class="calendar">
                      
                      <div class="calendar__day" v-for="n in 42" v-bind:key="n" v-bind:class={calendar__day_disactive:checkDisactiveDays(n)}>                        
                        <router-link :to =getPath[n-1] class="calendar_router-link"> </router-link>
                        <span>{{ info.days[n-1] }}</span>
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
    position: relative;
  } 
   .calendar__day:hover:not(.calendar__day_disactive){
    border:2px solid green;
  }

  .calendar__day_disactive{
    background-color: grey;
  }

  .calendar_router-link {
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
  }
  .calendar__day_disactive>.calendar_router-link{
     display:none;   
  }
  
</style>

<script>
    export default {
    data() {
    return {
      info: null,
      month: new Date().getMonth()+1,
      year:new Date().getFullYear()
    };
    },
    
    
        created() {
            console.log('Component created.');
            this.getMonth();
        },
        
        

        

   methods: {
    getMonth: function(){
       axios
      .get('/api/dnevnik/' + this.month +'/'+this.year)
      .then(response => (this.info = response.data));
    },

    nextMonth: function(){
       if(this.month==12) { 
         this.month= 1;
         this.year++;
       }else{
         this.month++
       } 
       this.getMonth();
    },

    prevMonth: function(){
       if(this.month==1) { 
         this.month= 12;
         this.year--;
       }else{
         this.month--
       } 

       this.getMonth();
    },
     
    checkDisactiveDays:function(n){
      if(this.info.days[n-1]<20 && n>28 || this.info.days[n-1]>n ) return true;
      return false
    },
  },


  computed: {
    day:function() {
      Date = new Date();
      return Date.getMonth();
      },
    getPath:function() { 
      let month=this.info.month;
      let year=this.info.year;
      
      let path =   this.info.days.map(
        function(day){
          return '/dnevnik/'+day + '-' + month +'-' + year;
          }
        );
      return path;
      },  
    
  

    }  
   
   
   

    }
</script>
