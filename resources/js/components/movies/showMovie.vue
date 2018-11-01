<template lang="html">
<div >
    <div class="banner">
            <div class="head-info">
                <div class="poster">
                    <img :src="'http://image.tmdb.org/t/p/w780//'+movie.poster_path" alt="Movie Poster">
                </div>
                <div class="movie-info">
                    <h3 class="card-title">{{movie.title}}</h3>
                    <em class="card-subtitle">({{movie.release_date}})</em>
                    <h5 class="card-title">Overview</h5>
                    <p class="card-text">{{movie.overview}}</p>
                    <div class="movie_body">
                        <div class="movie_head">
                            <div class="cast">
                                <h3 class="card-title">Cast:</h3>
                            </div>
                            <div class="genre">
                                <h3 class="card-title">Genre: <span>{{movie.genres[0].name}}</span></h3>
                            </div>
                        </div>
                        <div class="carousel">
                            <div class="actor-card" id="cast" v-for="cast in casts.slice(0, 8)">
                                <div class="actor-img">
                                    <img :src="'http://image.tmdb.org/t/p/w185//'+cast.profile_path || '/img/default.png'" class="img-fluid" alt="Cast Photo">
                                </div>
                                <div class="actor-info">
                                    <h6 class="card-title">{{cast.name}}</h6>
                                    <p class="card-subtitle">{{cast.character}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="movie-nav">
                        <button type="button" class="btn btn-primary" @click="showSimilar()">Show Similar Movies</button>
                        <button type="button" class="btn btn-primary" @click="showRecommend()">Show Recomended Movies</button>
                        <button type="button" class="btn btn-primary" @click="showTrailers()">Show Trailer(s)</button>
                        <a :href="'https://www.imdb.com/title/'+movie.imdb_id+'/?ref_=ttls_li_i'" target="_blank" class="btn btn-primary">Show IMDb</a>
                    </div>

                </div>
            </div>
            <div class="movie-trailers" :class="{'show_trailer' : trailer_show}">
                <center><h3>Trailers</h3></center>
                <div class="custom-vcard" v-for="trailer in trailers">
                    <iframe
                    width="100%" height="500px"
                    :src="'https://www.youtube.com/embed/'+trailer.key"
                    frameborder="0"
                    allow="autoplay;
                    encrypted-media"
                    allowfullscreen></iframe>
                    <hr>
                </div>
            </div>
            <div class="movie_recommend" :class="{'show_recommend' : recommend_show}">
                <div class="recommend_display">
                    <div class="movie_card" v-for="movie in recommends.slice(0, 16)">
                        <div class="movie-poster">
                            <a :href="'/movies/'+movie.id+'/'+movie.title">
                                <img :src="'http://image.tmdb.org/t/p/w500//'+movie.poster_path || '/img/default.png'" class="img-fluid" alt="Cast Photo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="movie_recommend" :class="{'show_similar' : similar_show}">
                <div class="recommend_display">
                    <div class="movie_card" v-for="movie in similars.slice(0, 16)">
                        <div class="movie-poster">
                            <a :href="'/movies/'+movie.id+'/'+movie.title">
                                <img :src="'http://image.tmdb.org/t/p/w500//'+movie.poster_path || '/img/default.png'" class="img-fluid" alt="Cast Photo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</div>
</template>

<script>
import favoritebtn from '../favoritebtn.vue';
export default {
    props:['data_id', 'hasChecked'],
    components: {
        favoritebtn
    },
    data(){
        return{
            movie_id:this.data_id,
            movie: [],
            casts:[],
            similars:[],
            trailers:[],
            recommends: [],
            cast_id:[],
            recommend_show:false,
            trailer_show:false,
            similar_show:false,

        }
    },
    created: function()
    {
        this.movieShow();
    },
    methods: {
        movieShow()
        {
            let instance = axios.create();
            delete instance.defaults.headers.common['X-CSRF-TOKEN'];
            delete instance.defaults.headers.common['X-Requested-With'];
// MOVIE ================================================================================================================================ //
            axios.get('https://api.themoviedb.org/3/movie/'+this.movie_id+'?api_key=44ac828069325145084ba23e0ccc3c25&language=en-US',{},{
                    responseType: 'json',
                    withCredentials: true
            })
            .then((response)=>{
                console.log('show',response);
                let data = response.data;
                this.displayMovies(data);
            });

// MOVIE CAST ================================================================================================================================ //
            axios.get("https://api.themoviedb.org/3/movie/"+this.movie_id+"/credits?api_key=44ac828069325145084ba23e0ccc3c25&limit=3",{},{
                    responseType: 'json',
                    withCredentials: true
            })
            .then((response)=>{
                console.log('cast',response);
                let data = response.data.cast;
                this.displayCast(data);
            });

// MOVIE TRAILER API ================================================================================================================================ //
            axios.get("https://api.themoviedb.org/3/movie/"+this.movie_id+"/videos?api_key=44ac828069325145084ba23e0ccc3c25&language=en-US",{},{
                    responseType: 'json',
                    withCredentials: true
            })
            .then((response)=>{
                console.log('video',response);
                let data = response.data.results;
                this.displayTrailer(data);
            });
// MOVIE RECOMENDED ========================================================================================================================================== //
            axios.get("https://api.themoviedb.org/3/movie/"+this.movie_id+"/recommendations?api_key=44ac828069325145084ba23e0ccc3c25&language=en-US&page=1",{},{
                    responseType: 'json',
                    withCredentials: true
            })
            .then((response)=>{
                console.log('recommend',response);
                let data = response.data.results;
                this.displayRecommend(data);
            });
// MOVIE SIMILAR ======================================================================================================================================== //
            axios.get('https://api.themoviedb.org/3/movie/'+this.movie_id+'/similar?api_key=44ac828069325145084ba23e0ccc3c25&language=en-US&page=1',{},{
                    responseType: 'json',
                    withCredentials: true
            })
            .then((response)=>{
                console.log('Similar Movie',response);
                let data = response.data.results;
                this.displaySimilar(data)
            })
            // ======================================================== //
        },
        displayMovies(data){
            this.movie = data;
        },
        displayCast(data)
        {
            this.casts = data;
        },
        displayTrailer(data)
        {
            this.trailers = data;
        },
        displayRecommend(data)
        {
            this.recommends = data;
        },
        displaySimilar(data)
        {
            this.similars = data;
        },
        showTrailers()
        {
            this.trailer_show = !this.trailer_show;
            this.similar_show = false;
            this.recommend_show = false;
        },
        showRecommend()
        {
            this.recommend_show = !this.recommend_show;
            this.similar_show = false;
            this.trailer_show = false;
        },
        showSimilar()
        {
            this.similar_show = !this.similar_show;
            this.recommend_show = false;
            this.trailer_show = false;
        }
    }
}
</script>

<style lang="css">
    .movie-nav{
        width: 100%;
    }
    .movie-interact{
        display: block;
        margin: 1em 0;
        width: 100%;
    }
    .movie-interact button{
        width: 25%;
    }
    .btn {
        box-shadow: 0 0 3px black;
    }
    .banner{
        position: relative;
    }
    .custom-bg{
        display: block;
        background: red;
    }
    #bg {
        z-index: -1;
        width: 100%;
    }
    .carousel{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
        grid-gap: 5px;
        width: 100%;
        text-align: center;
    }
    .actor-card{
        margin: 1px;
        border-radius: 5px;
        display: inline-block;
        width: 100%;
        height: 100%;
        border: 1px solid grey;
    }
    .actor-img img{
        border-radius: 5px 5px 0 0;
    }
    .actor-img{

    }
    .actor-info{
        padding: 1em;
        font-size: 0.8em;
    }
    .movie-trailers{
        padding: 1em 0;
        display: none;
        z-index: -1;
    }
    .custom-vcard{
        margin: auto;
        width: 50%;
    }
    .head-info{
        padding: 1em 5em;
        display: grid;
        grid-template-columns: 1fr 2fr;
        box-shadow: 0 1px 5px black;
        background-image: url('/img/subtle_bg.jpg');
        background-color: #eee;
    }
    .poster{
        padding: 0 2em;
    }
    .poster img {
        width:100%;
    }
    #cast img {
        width:100%;
        box-shadow: -1px 0 5px black;
    }
    .banner img {
        box-shadow: -1px 1px 5px black;
        margin-right: 1em;
    }
    .movie-card {
        text-align: center;
        margin: 1px;
        border: 1px solid black;
    }
    .show_trailer{
        z-index: -2;
        display:block;
    }
    .recommend_show{
        z-index: -2;
        display: block;
    }
    .movie_recommend{
        display: none;
        text-align: center;
        padding: 2em;
    }
    .recommend_display{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr;
        grid-gap: 5px;
    }
    .movie_card{
        width: 100%;
        height: 100%;
        border-radius: 5px;
        border: 1px solid grey;
    }
    .movie_card img {
        width:100%;
    }
    .show_recommend{
        display: block;
    }
    .show_similar{
        display: block;
    }
    .movie_head{
        display: grid;
        grid-template-columns: 1fr 2fr;
    }
    .movie_body{
        display: grid;
        grid-template-rows: 30px 1fr;
    }
</style>
