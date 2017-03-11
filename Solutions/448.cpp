#include<bits/stdc++.h>
using namespace std;
int main()
{
	
	vector<int> v;
	vector<int> c;
	int t;
	int a[1000000];
	int am[10000];
	int bm[10000];
	int b[1000000];
	cin>>t;
	while(t--)
	{

		int n;
		cin>>n;
		for (int i = 0; i < n; ++i)
		{
			int k;
			cin>>k;
			v.push_back(k);
		}

		a[0]=1;
		b[0]=1;
		am[0]=-1;
		bm[0]=-1;
		for (int i = 1; i < n; ++i)
		{
			am[i]=-1;
			a[i]=1;
			int max;
			max=0;
			int pos;
			for(int j=0;j<i;j++)
			{
				if(a[j]%2==0&&v[j]>v[i])
				{

					if(max<a[j])
					{

						max=a[j];
						pos=j;
					}					
				}
				else if(a[j]%2!=0&&v[j]<v[i])
				{
					if(max<a[j])
					{

						max=a[j];
						pos=j;
					}

				}	
				
				

			}
			a[i]=a[i]+max;
			if(max!=0)
			{
				am[i]=pos;
			}
			b[i]=1;
			bm[i]=-1;
			max=0;
			for(int j=0;j<i;j++)
			{
				if(b[j]%2==0&&v[j]<v[i])
				{

					if(max<b[j])
					{

						max=b[j];
						pos=j;
					}					
				}
				else if(b[j]%2!=0&&v[j]>v[i])
				{
					if(max<b[j])
					{

						max=b[j];
						pos=j;
					}

				}

				

			}
			b[i]=b[i]+max;
			if(max!=0)
			{
				bm[i]=pos;
			}
		}
		int mp;
		int flag;
		int mx=0;
		for (int i = 0; i < n; ++i)
		{
			if(a[i]>mx)
				{mx=a[i];
					flag=0;
					mp=i;
				}
			if (b[i]>mx)
			{
				mx=b[i];
				flag=1;
				mp=i;
			}
		}

		cout<<mx<<endl;
		
		int flagc;
		int count;
		count=0;
		if(flag==0)
		{c.push_back(v[mp]);
			if(am[mp]==-1)
				{flagc=0;}
			else{
				flagc=1;
				mp=am[mp];
			}

		}
		else
		{
			c.push_back(v[mp]);
			if(bm[mp]==-1)
				{flagc=0;}
			else{
				flagc=1;
				mp=bm[mp];
			}
		}
		count++;

		while(flagc)
		{
			if(flag==0)
		{c.push_back(v[mp]);
			if(am[mp]==-1)
				{flagc=0;}
			else{
				flagc=1;
				mp=am[mp];
			}

		}
		else
		{
			c.push_back(v[mp]);
			if(bm[mp]==-1)
				{flagc=0;}
			else{
				flagc=1;
				mp=bm[mp];
			}
		}
		count++;
		}

		for (int i = 0; i < count; ++i)
		{
			cout<<c[count-1-i]<<" ";
		}
		cout<<endl;

		v.clear();
		c.clear();
	}

}
