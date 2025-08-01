const express = require('express');
const http = require('http');
const socketIo = require('socket.io');
const cors = require('cors');
const { log } = require('console');

const app = express();
const server = http.createServer(app);
const io = socketIo(server, {
    cors: {
        origin: '*',
    }
});

app.use(cors());
app.use(express.json());

io.on('connection', (socket) => {
    console.log('Client connected:', socket.id);
});


app.get('/api/admin/socket', (req, res) => {
    const { title, description } = req.body;

    io.emit('new-message', { title, description });

    res.send({ status: 'Message broadcasted' });
});


server.listen(3000, () => {
    console.log('Socket.IO server running on port 3000');
});
