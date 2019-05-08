var app = require('express')(); 
var server = require('http').Server(app);
var io = require('socket.io')(server);
var debug = require('debug')('StreamView:Chat');
var request = require('request');
var dotenv = require('dotenv').config();

var port = process.env.PORT || '3000';

var socket_url = process.env.APP_URL;

process.env.DEBUG = '*';

server.listen(port);

io.on('connection', function (socket) {

    // console.log(socket.id);

    console.log('new connection established');
    
    socket.join(socket.handshake.query.user_id);

    socket.emit('connected', {'sessionID' : socket.id});

    socket.on('save_continue_watching_video', function(data) {

        console.log(data);

        url = socket_url+'userApi/save/watching/video?id='+data.id
        +'&token='+data.token
        +'&sub_profile_id='+data.sub_profile_id
        +'&admin_video_id='+data.admin_video_id
        +'&duration='+data.duration;

        console.log(url);

        request.get(url, function (error, response, body) {

        });

        console.log("send message END");

    });

    socket.on('signout_from_all_device', function(data) {

        receiver = data.id;

        socket.broadcast.to(receiver).emit('signout_profiles', data);

    });

    socket.on('disconnect', function(data) {

        console.log(data);

        console.log('disconnect close');

    });

});