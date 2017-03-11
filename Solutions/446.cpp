#include <bits/stdc++.h>
using namespace std;
int main(int argc, char const *argv[])
{
	int t;
	cin>>t;
	while(t--)
	{
		int n, flag=0;
		cin>>n;
		long a[n], l1[n], l2[n], par=0, len1=0, len2=0;
		for (int i = 0; i < n; ++i)
		{
			cin>>a[i];
			/* code */
		}
		l1[0]=a[0];
		for (int i = 1; i < n; ++i)
		{
			if (par)
			{
				if (a[i]<a[i-1])
				{
					len1++;
					l1[len1]=a[i];
					par = (par+1)%2;
				}
				else
				{
					l1[len1]=a[i];
				}

			}
			else
			{
				if (a[i]>a[i-1])
				{
					len1++;
					l1[len1]=a[i];
					par= (par+1)%2;
				}
				else
				{
					l1[len1]=a[i];
				}
			}
			/* code */
		}
		l2[0]=a[0];
		par=0;
		for (int i = 1; i < n; ++i)
		{
			if (par==0)
			{
				if (a[i]<a[i-1])
				{
					len2++;
					l2[len2]=a[i];
					par = (par+1)%2;
				}
				else
				{
					l2[len2]=a[i];
				}

			}
			else
			{
				if (a[i]>a[i-1])
				{
					len2++;
					l2[len2]=a[i];
					par=(par+1)%2;
				}
				else
				{
					l2[len2]=a[i];
				}
			}
			/* code */
		}
		if (len1>len2)
		{
			for (int i = 0; i <= len1; ++i)
			{
				cout<<l1[i]<<" ";
				/* code */
			}
			cout<<endl;
		}
		else
		{
			for (int i = 0; i <= len2; ++i)
			{
				cout<<l2[i]<<" ";
				/* code */
			}
			cout<<endl;
		}
	}
	return 0;
}