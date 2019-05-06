package com.example.bigdeck.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.example.bigdeck.R;
import com.example.bigdeck.model.CardsModel;
import com.squareup.picasso.NetworkPolicy;
import com.squareup.picasso.Picasso;

import java.util.List;

public class CardsAdapter extends ArrayAdapter<CardsModel> {

    List<CardsModel> cardList;
    Context context;
    private LayoutInflater inflater;

    public CardsAdapter(Context context, List<CardsModel> objects) {
        super(context, 0, objects);
        this.context = context;
        this.inflater = LayoutInflater.from(context);
        cardList = objects;
    }

    @Override
    public CardsModel getItem(int position) {
        return cardList.get(position);
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        final ViewHolder vh;
        if (convertView == null) {
            View view = inflater.inflate(R.layout.activity_cards, parent, false);
            vh = ViewHolder.create((RelativeLayout) view);
            view.setTag(vh);
        } else {
            vh = (ViewHolder) convertView.getTag();
        }

        CardsModel item = getItem(position);

        vh.textViewName.setText(item.getName());
        Picasso.with(context).load(item.getImage()).placeholder(R.mipmap.ic_launcher).error(R.mipmap.ic_launcher_round).into(vh.imageView);

        return vh.rootView;
    }

    private static class ViewHolder {
        public final RelativeLayout rootView;
        public final TextView textViewName;
        public final ImageView imageView;


        private ViewHolder(RelativeLayout rootView, TextView textViewName, ImageView imageView) {
            this.rootView = rootView;
            this.textViewName = textViewName;
            this.imageView = imageView;
        }

        public static ViewHolder create(RelativeLayout rootView) {
            TextView textViewName = rootView.findViewById(R.id.textViewName);
            ImageView imageView = rootView.findViewById(R.id.imageView);

            return new ViewHolder(rootView, textViewName, imageView);
        }
    }
}
