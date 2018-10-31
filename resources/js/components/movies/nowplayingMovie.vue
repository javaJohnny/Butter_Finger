<template lang="html">
    <div>
        <h3>Now Playing</h3>
        <div class="row" id="movies">
            <div class="col-md-6" v-for="movie in movies">
                <h5 class="well">{{movie.original_title}}</h5>
                <em>{{movie.release_date}}</em>
                <img :src="'http://image.tmdb.org/t/p/w500//'+movie.poster_path" alt="">
                <a :href="'/movies/'+movie.id+'/'+movie.title" class="btn btn-primary">Movie Details</a>


            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            movies:[],
        }
    },
    created:function(){
        this.loadMovies();
    },
    methods: {
        loadMovies()
        {
            let instance = axios.create();
            delete instance.defaults.headers.common['X-CSRF-TOKEN'];
            delete instance.defaults.headers.common['X-Requested-With'];
            axios.get('https://api.themoviedb.org/3/movie/now_playing?api_key=44ac828069325145084ba23e0ccc3c25&language=en-US&page=1',{},{
                    responseType: 'json',
                    withCredentials: true
            })
            .then((response)=>{
                console.log('now playing',response);
                let data = response.data.results;
                this.displayMovies(data)
            })
        },
        displayMovies(data)
        {
            this.movies = data;
        },
    }
}
</script>

<style lang="css" scoped>
    @media(min-width:960px){
        #movies img {
        }
    }
    #movies img {
        width: 100%;
    }
</style>
