<template lang="html">
  <div class="container">
      <div class="search-block">
          <div id="searchvue">
              <form id="searchForm">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Movie Name</span>
                      </div>
                          <input type="text"
                          @keypress.enter.prevent="doSearch"
                          v-model="search"
                          id="searchText"
                          placeholder="Search a Video" class="form-control">
                          <div class="input-group-append">
                              <button class="btn btn-outline-secondary" type="button" @click="doSearch" id="button-addon2">Search</button>
                          </div>
              </div>
              </form>
          </div>
      </div>
      <div class="display" v-show="show">
          <h3></h3>
          <iframe
          width="100%" height="500px"
          :src="'https://www.youtube.com/embed/'+videoId"
          frameborder="0"
          allow="autoplay;
          encrypted-media"
          allowfullscreen></iframe>
      </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            search: null,
            videoId:[],
            show:false,
        }
    },
    methods: {
        doSearch(){

            axios.get('https://www.googleapis.com/youtube/v3/search',{
                params:{
                    key: 'AIzaSyD3Xp7boF8CNetHQxMAGHBvrmWK5s2SdL4',
                    part: 'snippet',
                    maxResults: '1',
                    q: this.search,
                    type: 'video',
                }
            },{
                    responseType: 'json',
                    withCredentials: true
            })
            .then((response)=>{
                console.log('youtube',response);
                let data = response.data;
                console.log('data', data);
                let videoId = response.data.items[0].id.videoId;
                console.log('video_id' ,videoId);
                this.videoId = videoId;
                this.show = true;
            })
        },

    }
}
</script>

<style lang="css">

</style>
