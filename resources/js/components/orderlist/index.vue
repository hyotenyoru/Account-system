<template>  
    <div>
      <div><h2>您好!這裡是{{index['title']}}</h2></div>
       <div class="row justify-content-end">
        <div class="col-2">
          <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderlistModal">
              {{create['title']}}
          </button>
        </div>
        <div class="col-4">
          <input class="form-control me-2" type="search" v-bind:placeholder="index['search']['placeholder']" aria-label="Search" v-model="search">
        </div>
      </div>
      <table class="table mt-1">
        <thead>
          <tr>
            <th v-for="(title,index) in index['list']" :key="index" >
              {{title}}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item,start) in list" :key="start">
              <td v-for="(array,end) in listkey" :key="end">{{item[array]}}</td>
            <td>
              <a v-bind:href="index['url']+item[listkey[0]]"><span  class="badge bg-primary">檢視</span></a>
              <a v-bind:href="index['url']+item[listkey[0]]+'/edit'"><span  class="badge bg-secondary">修改</span></a>
            </td>
          </tr> 
        </tbody>
      </table>   
    </div>
</template>

<script>
    import json from './index.json'
    export default {
      mounted(){
          axios.get(this.create['url'])
          .then((response) => {
          this.datas=response.data;
          })
      },
      data: function() {
              return {
                  datas:[],
                  create:json['create'],
                  index:json['index'],
                  listkey:json['index']['list_key'],
                  key:json['index']['key'],
                  order_key:json['index']['order_key'],
                  custom_id:document.getElementById('custom_id').innerHTML,
                  order_id:document.getElementById('order_id').innerHTML,
                  search:'',
              }
      },
      computed:{
        list:function () {
          var list=[];
          var listdata=[];
          this.datas.forEach(array => {
            var arraykey=array[this.order_key];
            if (arraykey.indexOf(this.order_id)!=-1) 
                listdata.push(array);
          });
          listdata.forEach(array => {
            var arraykey=array[this.key];
            if (arraykey.indexOf(this.search)!=-1) 
                list.push(array);
          });
          return list;
        }
      }
    }
</script>
