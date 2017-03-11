#include<bits/stdc++.h>
using namespace std;
long long int a[100005][4];
stack <long long int > st;
int main()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		long long int n,i,j,temp,tempind,temptype=0;
		scanf("%lld",&n);
		for(i=0;i<n;i++)
			scanf("%lld",&a[i][0]);
		a[0][1]=1;
		for(i=0;i<n;i++)	
		{
			temp=0;
			tempind=0;
			for(j=0;j<i;j++)
			{
				if(temp<=a[j][1] &&( (a[i][0]>a[j][0] &&a[j][2]>a[j][0]) || (a[i][0]<a[j][0] &&a[j][2]<a[j][0]) ||(j==0) ) )
				{
					temp = a[j][1]+1;
					tempind = j;
					//temptype = 1-a[j][3];
				}
			}
			
			a[i][1] = temp;
			a[i][2] = a[tempind][0];
			//a[i][3] = 1-temptype;
		}
		
		temp=0;
		tempind = 0;		
		for(i=0;i<n;i++)
		{
			if(a[i][1]>temp)
			{
				temp=a[i][1];
				tempind=i;
			}
		}
		st.push(a[tempind][0]);
		temp=a[tempind][2];
		for(i=tempind-1;i>=0;i--)
		{
			if(a[i][0]==temp)
			{
				st.push(a[i][0]);
				temp=a[i][2];
			}
		}
		
		printf("%lld\n",a[tempind][1]+1);
		for(i=0;i<a[tempind][1]+1;i++)
		{
			printf("%lld ",st.top());
			st.pop();
		}
		printf("\n");
		
		/*for(i=0;i<n;i++)
		{
			printf("%lld\t%lld\t%lld\t%lld\n",a[i][0],a[i][1],a[i][2],a[i][3]);
		}*/
	}
	return 0;
}