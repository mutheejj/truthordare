# Truth or Dare - Black & White Edition

A modern, advanced Truth or Dare game with an admin panel for managing questions and multi-player support. Built with Laravel and styled with a minimalist black and white design.

## 🎮 Features

### Game Features
- **Multi-Player Support**: Add 2 or more players at the start of the game
- **Player Turn Tracking**: Automatically tracks whose turn it is
- **Round Counter**: Keep track of game progress
- **Dynamic Content**: Questions and dares loaded from database
- **Skip Option**: Don't like a prompt? Skip to get a new one
- **Responsive Design**: Works seamlessly on all devices

### Admin Panel Features
- **Dashboard**: Overview of all truths, dares, and their statuses
- **Truths Management**: Add, edit, delete, and toggle truth questions
- **Dares Management**: Add, edit, delete, and toggle dare challenges
- **Active/Inactive Status**: Enable or disable questions without deleting them
- **No Authentication Required**: Simple, direct access to admin panel

### Design
- **Clean Black & White**: Modern, minimalist interface
- **Bold Typography**: Large, impactful text using Space Grotesk font
- **Smooth Animations**: Polished transitions and hover effects
- **Responsive Tables**: Organized display of all questions and dares

## 🛠️ Tech Stack

- **Laravel 11**: PHP framework
- **Tailwind CSS 4.0**: Utility-first CSS framework
- **Vite**: Modern frontend build tool
- **SQLite/MySQL**: Database for storing questions
- **Space Grotesk Font**: Clean, geometric sans-serif typeface

## 📦 Installation

1. **Navigate to project directory**
   ```bash
   cd /home/muthee/projects/moringa/truthordare
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Set up environment file**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   
   Edit `.env` file and set your database connection (SQLite is default):
   ```env
   DB_CONNECTION=sqlite
   ```
   
   Or for MySQL:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=truthordare
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run migrations and seed data**
   ```bash
   php artisan migrate:fresh --seed
   ```
   
   This will:
   - Create all necessary database tables
   - Seed 30 truth questions
   - Seed 30 dare challenges

7. **Build assets**
   ```bash
   npm run build
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

9. **Access the application**
   - Game: `http://localhost:8000`
   - Admin Panel: `http://localhost:8000/admin`

## 🎯 How to Play

1. **Start the Game**: Click "START GAME" on the welcome screen
2. **Add Players**: Enter names of all players (minimum 2)
3. **Choose Truth or Dare**: Current player chooses between TRUTH or DARE
4. **Complete the Challenge**: Read and complete the prompt
5. **Next Turn**: Click "NEXT" to move to the next player
6. **Skip**: Use "SKIP" if you want a different prompt of the same type

## 👨‍💼 Admin Panel

Access the admin panel at `http://localhost:8000/admin`

### Dashboard
- View total and active counts for truths and dares
- Quick access to manage truths and dares

### Managing Truths
- **View All**: `/admin/truths`
- **Add New**: `/admin/truths/create`
- **Edit**: Click "Edit" button on any truth
- **Delete**: Click "Delete" button (with confirmation)
- **Toggle Status**: Edit and check/uncheck "Active" checkbox

### Managing Dares
- **View All**: `/admin/dares`
- **Add New**: `/admin/dares/create`
- **Edit**: Click "Edit" button on any dare
- **Delete**: Click "Delete" button (with confirmation)
- **Toggle Status**: Edit and check/uncheck "Active" checkbox

## 🔧 Development

### Run Development Server with Hot Reload

```bash
# Terminal 1: Start Laravel server
php artisan serve

# Terminal 2: Start Vite dev server
npm run dev
```

### Database Management

**Fresh migration with seeding:**
```bash
php artisan migrate:fresh --seed
```

**Run only seeders:**
```bash
php artisan db:seed
```

**Run specific seeder:**
```bash
php artisan db:seed --class=TruthsTableSeeder
php artisan db:seed --class=DaresTableSeeder
```

## 📝 Game Routes

- `GET /` - Main game page
- `GET /api/truth` - Get random truth question (JSON)
- `GET /api/dare` - Get random dare challenge (JSON)

## 🔐 Admin Routes

- `GET /admin` - Admin dashboard
- `GET /admin/truths` - List all truths
- `GET /admin/truths/create` - Create new truth
- `POST /admin/truths` - Store new truth
- `GET /admin/truths/{id}/edit` - Edit truth
- `PUT /admin/truths/{id}` - Update truth
- `DELETE /admin/truths/{id}` - Delete truth

Same routes structure for `/admin/dares`

## 🎨 Customization

### Adding Content via Admin Panel

1. Go to `http://localhost:8000/admin`
2. Click "Add New" under Truths or Dares
3. Enter your question/challenge
4. Check "Active" to show in game
5. Click "Create"

### Modifying Colors

The game uses a black and white color scheme. To modify:

**Admin Panel Colors:**
Edit `/resources/views/admin/layout.blade.php`

**Game Colors:**
Edit `/resources/views/game.blade.php`

Tailwind classes used:
- `bg-black` / `bg-white` - backgrounds
- `text-black` / `text-white` - text colors
- `border-black` - borders

### Changing Font

Update font in both views:
```html
<link href="https://fonts.bunny.net/css?family=your-font:400,500,600,700" rel="stylesheet" />
```

And in `/resources/css/app.css`:
```css
@theme {
    --font-sans: 'Your Font', ui-sans-serif, system-ui, sans-serif;
}
```

## 📊 Database Schema

### Truths Table
- `id` - Primary key
- `question` - Text (truth question)
- `is_active` - Boolean (show in game)
- `created_at` - Timestamp
- `updated_at` - Timestamp

### Dares Table
- `id` - Primary key
- `challenge` - Text (dare challenge)
- `is_active` - Boolean (show in game)
- `created_at` - Timestamp
- `updated_at` - Timestamp

## 🐛 Troubleshooting

**No questions appearing in game:**
- Make sure you ran `php artisan migrate:fresh --seed`
- Check admin panel to ensure questions are marked as "Active"
- Verify database connection in `.env` file

**Admin panel not accessible:**
- Clear browser cache
- Run `npm run build` again
- Check if routes are registered: `php artisan route:list`

**Styling not loading:**
- Run `npm run build` or `npm run dev`
- Clear browser cache
- Check if Vite is running

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🎉 Credits

Built with ❤️ using Laravel and Tailwind CSS

---

**Note**: This game is meant for entertainment purposes. Always play responsibly and ensure all players are comfortable with the game content.

## 🚀 Quick Start Commands

```bash
# Setup
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm run build

# Run
php artisan serve
# Then visit: http://localhost:8000

# Admin Panel
# Visit: http://localhost:8000/admin
```

Enjoy playing Truth or Dare! 🎲
