<template>  
    <div>
      <div><h2>您好!這裡是{{index[title]}}</h2></div>
      <div class="row justify-content-end">
        <div class="col-2">
          <a class="btn btn-outline-primary" v-bind:href="index['url']+'create'">{{create['title']}}</a>
        </div>
        <div class="col-4">
          <input class="form-control me-2" type="search" v-bind:placeholder="index['search']['placeholder']" aria-label="Search" v-model="search">
        </div>
      </div>
      <table class="table mt-1">
        <thead>
          <tr>
            <th v-for="(title,index) in index[list]" :key="index" >
              {{title}}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item,index) in list" :key="index">
              <td v-for="(array,index) in index[key]" :key="index">{{item[array]}}</td>
            <td>
              <a v-bind:href="index['url']+item[array[0]]"><span  class="badge bg-primary">檢視</span></a>
              <a v-bind:href="index['url']+item[array[0]]+'/edit'"><span  class="badge bg-secondary">修改</span></a>
            </td>
          </tr> 
        </tbody>
      </table>    
    </div>
</template>

<script>
    import json from 'index.json'
    export default {
      mounted(){
          axios.get(url)
          .then((response) => {
          this.datas=response.data;
          })
      },
      data: function() {
              return {
                  datas:[],
                  create:json['create'],
                  index:json['index'],
                  key:index['key'],
                  search:'',
              }
      },
      computed:{
        list:function () {
          var list=[];
          this.datas.forEach(array => {
            if (array[key].indexOf(this.search)!=-1) 
                list.push(array);
          });
          return list;
        }
      }
    }
</script>
