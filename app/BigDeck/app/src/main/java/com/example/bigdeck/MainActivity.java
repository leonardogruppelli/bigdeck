package com.example.bigdeck;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Button buttonRarities = findViewById(R.id.buttonRarities);
        Button buttonTypes = findViewById(R.id.buttonTypes);
        Button buttonRaces = findViewById(R.id.buttonRaces);
        Button buttonClasses = findViewById(R.id.buttonClasses);
        Button buttonCards = findViewById(R.id.buttonCards);

        buttonRarities.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, RaritiesActivity.class));
            }
        });

        buttonTypes.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, TypesActivity.class));
            }
        });

        buttonRaces.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, RacesActivity.class));
            }
        });

        buttonClasses.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, ClassesActivity.class));
            }
        });

        buttonCards.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, CardsActivity.class));
            }
        });
    }
}