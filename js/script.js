// JavaScript code for creating and animating balls
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// Define the Ball class
class Ball {
  constructor(x, y, radius, color) {
    this.x = x;
    this.y = y;
    this.radius = radius;
    this.color = color;
    this.speedX = Math.random() - 0.5;
    this.speedY = Math.random() - 0.5;
  }

  // Draw the ball
  draw() {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
  // Create gradient for ball
    const gradient = ctx.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.radius);
    gradient.addColorStop(0, 'rgba(255, 255, 255, 0.8)'); // Transparent white at center
    gradient.addColorStop(1, this.color); // Ball's color at edges

    // Apply gradient
    ctx.fillStyle = gradient;
    ctx.fill();
    ctx.closePath();
  }

  // Update ball position and color
  update() {
    this.x += this.speedX;
    this.y += this.speedY;
    
    // If ball hits canvas boundaries, reverse direction and change color
    if (this.x - this.radius < 0 || this.x + this.radius > canvas.width) {
      this.speedX = -this.speedX;
      this.color = `hsl(${Math.random() * 360}, 50%, 50%)`; // Change color
    }
    if (this.y - this.radius < 0 || this.y + this.radius > canvas.height) {
      this.speedY = -this.speedY;
      this.color = `hsl(${Math.random() * 360}, 50%, 50%)`; // Change color
    }
    
    this.draw(); // Redraw the ball
  }
}

// Array to store balls
const balls = [];

// Function to initialize balls
function init() {
  for (let i = 0; i < 10; i++) {
    // Randomize position, radius, and color for each ball
    const radius = Math.random() * 35 + 20; // Random radius between 20 and 55
    const x = Math.random() * (canvas.width - radius * 2) + radius;
    const y = Math.random() * (canvas.height - radius * 2) + radius;
    const color = `hsl(${Math.random() * 360}, 50%, 50%)`; // Random HSL color
    balls.push(new Ball(x, y, radius, color)); // Create and add new ball to array
  }
}

// Function to animate balls
function animate() {
  requestAnimationFrame(animate);
  ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas
  balls.forEach(ball => {
    ball.update(); // Update and draw each ball
  });
}

init(); // Initialize balls
animate(); // Start animation loop