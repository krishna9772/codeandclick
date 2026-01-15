import "./bootstrap";
import "jodit/es2021/jodit.fat.min.css";

import Alpine from "alpinejs";
import { Jodit } from "jodit";

window.Jodit = Jodit;

window.Alpine = Alpine;

Alpine.start();
