<template lang="html">
    <div class="container">
        <div>
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
                            placeholder="Search a Movie" class="form-control">
                            <div class="input-group-append">
                                <a class="btn btn-outline-secondary" :href="'/search/'+search" id="button-addon2">Search</a>
                            </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="movies" class="row">
            <div class="col-md-3" id="margin" v-for="movie in movies">
                <img :src='"http://image.tmdb.org/t/p/w342//"+movie.poster_path' alt="">
                <h5>{{movie.title}}</h5>
                <p>({{movie.release_date}})</p>
                <a :href="'/movies/'+movie.id+'/'+movie.title" class="btn btn-primary">Movie Details</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['title'],
    data(){
        return{
            year:null,
            search: this.title,
            movies: [],
        }
    },
    created:function(){
            this.doSearch();
    },
    methods: {
        doSearch(event)
        {

            let instance = axios.create();
            delete instance.defaults.headers.common['X-CSRF-TOKEN'];
            delete instance.defaults.headers.common['X-Requested-With'];
            axios.get('https://api.themoviedb.org/3/search/movie?api_key=44ac828069325145084ba23e0ccc3c25&language=en-US&query='+this.search+'&page=1&include_adult=false',{},{
                    responseType: 'json',
                    withCredentials: true
            })
            .then((response)=>{
                console.log('search',response);
                let data = response.data.results;
                this.loadMovies(data);
            })

        },
        loadMovies(data)
        {
            this.movies = data;
        },
        movieSelected(id, title){
            sessionStorage.setItem('id', id);
            sessionStorage.setItem('title', title);
            return false;
        },
    }
}
</script>

<style lang="css" scoped>
    .search-block{
        margin-top: 25%;
    }
    #searchvue{
        text-align: center;
    }
    .show {
        margin-top:2% !important;
        transition: 0.5s ease;
    }
    #movies{
        margin-top: 3%;
        text-align: center;
    }
    #movies img, #movies img {
        box-shadow: 0 0 5px black;
        border-radius: 5px;
        border: 1em solid #eee;
        width:100%;
    }
    #margin {
        margin-bottom:10px !important;
    }
    @media(min-width:960px){
        #movies .col-md-3 .well{
            height:390px
        }

        #movies .col-md-3 img {
            height:475px;
        }
    }
</style>
