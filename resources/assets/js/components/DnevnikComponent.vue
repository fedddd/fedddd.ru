<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div>                                                                          
                        
                        <h3 align="center">
                          <div class="calendar__prevMonth" @click="prevMonth"></div>
                           {{ info.monthText }} {{ info.year }}
                          <div class="calendar__nextMonth" @click="nextMonth"></div>
                        </h3>
                        
                     <div class="calendar"> 
                     
                      <div class="calendar__day" v-for="n in 42" v-bind:key="n" v-bind:class={calendar__day_disactive:checkDisactiveDays(n),calendar__day_datenow:checkDateNow(n)}>                                  
                           <router-link :to =getPath[n-1] class="calendar_router-link"> </router-link>                          
                        <span>{{ info.days[n-1].day }}</span><br>
                        <span>{{ info.days[n-1].data.msg }}</span>                         
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
  .calendar__day_datenow{
    background-color: #ffd586;
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
  .calendar__prevMonth{
    width:0px;
    height: 0px;
    border: 10px solid transparent;
    border-right: 10px solid;
    cursor: pointer;
    display: inline-block;
  }
  .calendar__nextMonth{
    width:0px;
    height: 0px;
    border: 10px solid transparent;
    border-left: 10px solid;
    cursor: pointer;
    display: inline-block;
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

    props:['checkLogin'],
   
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
      if(this.info.days[n-1].day<20 && n>28 || this.info.days[n-1].day>n ) return true;
      return false
    },

    checkDateNow:function(n){
      if(!(this.info.days[n-1].day<20 && n>28 || this.info.days[n-1].day>n) ){
        let day=new Date().getDate();
        let month =new Date().getMonth()+1; 
        if(this.info.days[n-1].day==day && this.month==month) 
         return true
      };
          
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
          return '/dnevnik/'+day.day + '-' + month +'-' + year;
          }
        );
      return path;
      },  
    
  

    }  
   
   
   

    }
</script>
