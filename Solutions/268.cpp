#include<iostream>
using namespace std;
int main()
{
	string a,b;
	int t,sum;
	cin>>t;
	while(t--)
	{	sum=0;
		cin>>a;
		cin>>b;
		for(int i=0;i<a.length();i++)
			{	
				if((int)a[i]-b[i]>=0)
				sum=sum+(int)a[i]-b[i];
				else
				sum=sum+(int)b[i]-a[i];
			
			}
			cout<<sum<<endl;
	}
}